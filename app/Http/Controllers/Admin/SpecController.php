<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Spec\StoreSpecRequest;
use App\Http\Requests\Admin\Spec\UpdateSpecRequest;
use App\Models\CarModel;
use App\Models\ModelComplectation;
use App\Models\Spec;
use App\Services\Admin\SpecService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecController extends Controller
{
    public SpecService $service;

    public function __construct(SpecService $specService)
    {
        $this->service = $specService;
    }

    public function index(Request $request)
    {
        $data['complectation'] = ModelComplectation::find($request->complectation_id);
        $data['specs'] = Spec::where('complectation_id', $data['complectation']->id)->get();
        return view('admin.specs.index', $data);
    }

    // public function create(Request $request)
    // {
    //     $model = CarModel::find($request->complectation_id);
    //     $models = CarModel::all();
    //     return view('admin.specs.create', ['complectation' => $models, 'model' => $model]);
    // }

    public function store(StoreSpecRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        $complectatition = ModelComplectation::find($request->complectation_id);
        // $car_model = CarModel::find($model->model_id);
        return redirect()->route('admin.specs.index', ['complectation_id' => $complectatition->id])->with('success', trans('messages.success_created'));
    }

    public function edit(Spec $spec)
    {
        $complectations = ModelComplectation::all();
        return view('admin.specs.edit', ['spec' => $spec, 'complectations' => $complectations]);
    }

    public function update(UpdateSpecRequest $request, Spec $spec)
    {
        DB::beginTransaction();
        try {
            $this->service->update($spec, $request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        //with complectation_id
        return redirect()->route('admin.specs.index', ['complectation_id' => $spec->complectation_id])->with('success', trans('messages.success_updated'));
    }

    public function destroy(Spec $spec)
    {
        try {
            DB::transaction(function () use ($spec) {
                return $this->service->delete($spec);
            });
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.specs.index')->with('success', trans('messages.success_deleted'));
    }
}
