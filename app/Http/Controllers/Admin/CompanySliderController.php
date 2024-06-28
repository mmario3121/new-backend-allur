<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanySlider\StoreCompanySliderRequest;
use App\Http\Requests\Admin\CompanySlider\UpdateCompanySliderRequest;
use App\Models\CompanySlider;
use App\Services\Admin\CompanySliderService;
use Illuminate\Support\Facades\DB;

class CompanySliderController extends Controller
{
    public CompanySliderService $service;

    public function __construct(CompanySliderService $aboutBannerService)
    {
        $this->service = $aboutBannerService;
    }

    public function index()
    {
        $data['companySliders'] = CompanySlider::all();
        return view('admin.companySliders.index', $data);
    }

    public function create()
    {

        return view('admin.companySliders.create');
    }

    public function store(StoreCompanySliderRequest $request)
    {
        try {
            $data['companySlider'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.companySliders.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(CompanySlider $companySlider)
    {
        return view('admin.companySliders.edit', ['companySlider' => $companySlider]);
    }

    public function update(UpdateCompanySliderRequest $request, CompanySlider $companySlider)
    {
        try {
            DB::transaction(function () use ($request, $companySlider) {
               return $this->service->update($companySlider,$request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }

    //destroy function
    public function destroy(CompanySlider $companySlider){
        try {
            DB::transaction(function () use ($companySlider) {
               return $this->service->destroy($companySlider);
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
}
