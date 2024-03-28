<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\StoreBrandRequest;
use App\Http\Requests\Admin\Brand\UpdateBrandRequest;
use App\Models\Brand;
use App\Services\Admin\BrandService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public BrandService $service;

    public function __construct(BrandService $brandService)
    {
        $this->service = $brandService;
    }

    public function index()
    {
        $data['brands'] = Brand::query()->get();
        return view('admin.brands.index', $data);
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(StoreBrandRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->service->create($request->validated());

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.brands.index')->with('success', trans('messages.success_created'));
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', ['brand' => $brand]);
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        DB::beginTransaction();
        try {
            $this->service->update($brand, $request->validated());

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.brands.index')->with('success', trans('messages.success_updated'));
    }

    public function destroy(Brand $brand)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($brand->load(['titleTranslate', 'descriptionTranslate']));
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.brands.index')->with('success', trans('messages.success_deleted'));
    }

}
