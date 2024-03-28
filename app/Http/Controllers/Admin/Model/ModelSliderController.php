<?php

namespace App\Http\Controllers\Admin\Model;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModelSlider\StoreModelSliderRequest;
use App\Http\Requests\Admin\ModelSlider\UpdateModelSliderRequest;
use App\Models\ModelSlider;
use App\Models\CarModel;
use App\Services\Admin\Model\ModelSliderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ModelSliderController extends Controller
{
    public ModelSliderService $service;

    public function __construct(ModelSliderService $modelService)
    {
        $this->service = $modelService;
    }

    public function index(Request $request)
    {
        $data['modelSliders'] = ModelSlider::where('model_id', $request->model_id)->orderBy('position')->get();
        $data['model'] = CarModel::find($request->model_id);
        // dd($data['model']);
        return view('admin.modelSliders.index', $data);
    }

    public function create(Request $request)
    {
        $data['model'] = CarModel::find($request->model_id);
        return view('admin.modelSliders.create', $data);
    }

    public function store(StoreModelSliderRequest $request)
    {
        try {
            $data['modelSlider'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.modelSliders.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(ModelSlider $modelSlider): View
    {
        $data['modelSlider'] = $modelSlider;
        $data['model'] = CarModel::find($modelSlider->model_id);
        return view('admin.modelSliders.edit', $data);
    }

    public function update(UpdateModelSliderRequest $request, ModelSlider $modelSlider)
    {
        try {
            DB::transaction(function () use ($request, $modelSlider) {
               return $this->service->update($modelSlider, $request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.modelSliders.edit', $modelSlider)
        ->with('success', trans('messages.success_created'));
    }

    public function destroy(ModelSlider $modelSlider)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($modelSlider);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }

        return back()->with('success', trans('messages.success_deleted'));
    }

}
