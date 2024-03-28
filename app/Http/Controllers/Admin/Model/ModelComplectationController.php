<?php

namespace App\Http\Controllers\Admin\Model;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModelComplectation\StoreModelComplectationRequest;
use App\Http\Requests\Admin\ModelComplectation\UpdateModelComplectationRequest;
use App\Models\ModelComplectation;
use App\Models\CarModel;
use App\Services\Admin\Model\ModelComplectationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ModelComplectationController extends Controller
{
    public ModelComplectationService $service;

    public function __construct(ModelComplectationService $modelService)
    {
        $this->service = $modelService;
    }

    public function index(Request $request)
    {
        $data['complectations'] = ModelComplectation::where('model_id', $request->model_id)->get();
        $data['model'] = CarModel::find($request->model_id);
        // dd($data['model']);
        return view('admin.complectations.index', $data);
    }

    public function create(Request $request)
    {
        $data['model'] = CarModel::find($request->model_id);
        return view('admin.complectations.create', $data);
    }

    public function store(StoreModelComplectationRequest $request)
    {
        try {
            $data['complectation'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.complectations.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(ModelComplectation $complectation): View
    {
        $data['complectation'] = $complectation;
        $data['model'] = CarModel::find($complectation->model_id);
        return view('admin.complectations.edit', $data);
    }

    public function update(UpdateModelComplectationRequest $request, ModelComplectation $complectation)
    {
        try {
            DB::transaction(function () use ($request, $complectation) {
               return $this->service->update($complectation, $request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.complectations.edit', $complectation)
        ->with('success', trans('messages.success_created'));
    }

    public function destroy(ModelComplectation $complectation)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($complectation);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }

        return back()->with('success', trans('messages.success_deleted'));
    }

}
