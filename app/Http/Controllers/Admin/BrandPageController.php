<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandPage\StoreBrandPageRequest;
use App\Http\Requests\Admin\BrandPage\UpdateBrandPageRequest;
use App\Models\BrandPage;
use App\Services\Admin\BrandPageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandPageController extends Controller
{
    public BrandPageService $service;

    public function __construct(BrandPageService $brandService)
    {
        $this->service = $brandService;
    }

    public function index(Request $request)
    {
        //if there is BrandPage with $request->brand_id, then go to edit page else create page
        $brandPage = BrandPage::query()->where('brand_id', $request->brand_id)->first();
        if ($brandPage) {
            return redirect()->route('admin.brandPages.edit', $brandPage);
        } else {
            return redirect()->route('admin.brandPages.create', ['brand_id' => $request->brand_id]);
        }
    }

    public function create(Request $request)
    {
        $brand_id = $request->brand_id;
        return view('admin.brandPages.create', compact('brand_id'));
    }

    public function store(StoreBrandPageRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->service->create($request->validated());

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.brandPages.index')->with('success', trans('messages.success_created'));
    }

    public function edit(BrandPage $brandPage)
    {
        return view('admin.brandPages.edit', ['brandPage' => $brandPage]);
    }

    public function update(UpdateBrandPageRequest $request, BrandPage $brandPage)
    {
        DB::beginTransaction();
        try {
            $this->service->update($brandPage, $request->validated());

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.brandPages.edit', $brandPage)->with('success');
    }

    public function destroy(BrandPage $brandPage)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($brandPage->load(['titleTranslate', 'descriptionTranslate']));
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.brandPages.index')->with('success', trans('messages.success_deleted'));
    }

}
