<?php

namespace App\Http\Controllers\Admin\Model;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpecificationCategory\StoreSpecificationCategoryRequest;
use App\Http\Requests\Admin\SpecificationCategory\UpdateSpecificationCategoryRequest;
use App\Models\SpecificationCategory;
use App\Models\SpecificationCategoryItem;
use App\Models\CarModel;
use App\Services\Admin\Model\SpecificationCategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class SpecificationCategoryController extends Controller
{
    public SpecificationCategoryService $service;

    public function __construct(SpecificationCategoryService $modelService)
    {
        $this->service = $modelService;
    }

    public function index(Request $request)
    {
        $data['specificationCategories'] = SpecificationCategory::where('model_id', $request->model_id)->get();
        $data['model'] = CarModel::find($request->model_id);
        return view('admin.specificationCategories.index', $data);
    }

    public function create(Request $request)
    {
        $data['model'] = CarModel::find($request->model_id);
        return view('admin.specificationCategories.create', $data);
    }

    public function store(StoreSpecificationCategoryRequest $request)
    {
        try {
            $data['specificationCategory'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.specificationCategories.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(SpecificationCategory $specificationCategory): View
    {
        $data['specificationCategory'] = $specificationCategory;
        $data['model'] = CarModel::find($specificationCategory->model_id);
        // dd($data);
        return view('admin.specificationCategories.edit', $data);
    }

    public function update(UpdateSpecificationCategoryRequest $request, SpecificationCategory $specificationCategory)
    {
        try {
            DB::transaction(function () use ($request, $specificationCategory) {
               return $this->service->update($specificationCategory, $request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.specificationCategories.edit', $specificationCategory)
        ->with('success', trans('messages.success_created'));
    }

    public function destroy(SpecificationCategory $specificationCategory)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($specificationCategory);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }

        return back()->with('success', trans('messages.success_deleted'));
    }

}
