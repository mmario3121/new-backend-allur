<?php

namespace App\Http\Controllers\Admin\Model;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModelColor\StoreModelColorRequest;
use App\Http\Requests\Admin\ModelColor\UpdateModelColorRequest;
use App\Models\ModelColor;
use App\Models\CarModel;
use App\Services\Admin\Model\ModelColorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ModelColorController extends Controller
{
    public ModelColorService $service;

    public function __construct(ModelColorService $modelService)
    {
        $this->service = $modelService;
    }

    public function index(Request $request)
    {
        $data['colors'] = ModelColor::where('model_id', $request->model_id)->get();
        $data['model'] = CarModel::find($request->model_id);
        // dd($data['model']);
        return view('admin.colors.index', $data);
    }

    public function create(Request $request)
    {
        $data['model'] = CarModel::find($request->model_id);
        return view('admin.colors.create', $data);
    }

    public function store(StoreModelColorRequest $request)
    {
        try {
            $data['color'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.colors.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(ModelColor $color): View
    {
        $data['color'] = $color;
        $data['model'] = CarModel::find($color->model_id);
        return view('admin.colors.edit', $data);
    }

    public function update(UpdateModelColorRequest $request, ModelColor $color)
    {
        try {
            DB::transaction(function () use ($request, $color) {
               return $this->service->update($color, $request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.colors.edit', $color)
        ->with('success', trans('messages.success_created'));
    }

    public function destroy(ModelColor $color)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($color);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }

        return back()->with('success', trans('messages.success_deleted'));
    }

}
