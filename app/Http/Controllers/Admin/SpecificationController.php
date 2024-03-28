<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Specification\StoreSpecificationRequest;
use App\Http\Requests\Admin\Specification\UpdateSpecificationRequest;
use App\Models\Specification;
use App\Models\ModelComplectation;
use App\Models\SpecificationCategory;
use App\Services\Admin\Specification\SpecificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecificationController extends Controller
{
    protected SpecificationService $service;

    public function __construct(SpecificationService $specificationService)
    {
        $this->service = $specificationService;
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $data['specifications'] = Specification::where('specification_category_id', $request->specificationCategory_id)->get();
        $data['specificationCategory'] = SpecificationCategory::find($request->specificationCategory_id);
        return view('admin.specifications.index', $data);
    }

    public function create(Request $request)
    {
        $data['specificationCategory'] = SpecificationCategory::find($request->specification_category_id);
        $data['complectations'] = ModelComplectation::where('model_id', $data['specificationCategory']->model_id)->get();
        return view('admin.specifications.create', $data);
    }


    public function store(StoreSpecificationRequest $request)
    {

        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        $data['specificationCategory_id'] = $request->specification_category_id;
        // dd($data);
        return redirect()->route('admin.specifications.index', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(Specification $specification)
    {
        $data['complectations'] = ModelComplectation::where('model_id', $specification->complectation->model_id)->get();
        $data['specification'] = $specification;
        $data['specificationCategory'] = SpecificationCategory::find($specification->specification_category_id);
        return view('admin.specifications.edit', $data);
    }

    public function update(UpdateSpecificationRequest $request, Specification $specification)
    {
        try {
            DB::transaction(function () use ($request, $specification) {
                return $this->service->update($request->validated(), $specification);
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.specifications.edit', $specification)
        ->with('success', trans('messages.success_created'));
    }

    public function destroy(Specification $specification)
    {
        $data['specificationCategory_id'] = $specification->specification_category_id;
        try {
            DB::transaction(function () use ($specification) {
                return $this->service->delete($specification);
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        
        return redirect()->route('admin.specifications.index', $data)
        ->with('danger', trans('messages.success_deleted'));
    }
}
