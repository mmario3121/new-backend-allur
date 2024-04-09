<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutCompany\StoreAboutCompanyRequest;
use App\Http\Requests\Admin\AboutCompany\UpdateAboutCompanyRequest;
use App\Models\AboutCompany;
use App\Services\Admin\AboutCompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutCompanyController extends Controller
{
    public AboutCompanyService $service;

    public function __construct(AboutCompanyService $aboutCompanyService)
    {
        $this->service = $aboutCompanyService;
    }

    public function index(Request $request)
    {
        $data['aboutCompanies'] = AboutCompany::all();
        return view('admin.aboutCompanies.index', $data);
    }

    public function create()
    {
        return view('admin.aboutCompanies.create');
    }

    public function store(StoreAboutCompanyRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.aboutCompanies.index')->with('success', trans('messages.success_created'));
    }

    public function edit(AboutCompany $aboutCompany)
    {
        return view('admin.aboutCompanies.edit', ['aboutCompany' => $aboutCompany]);
    }

    public function update(UpdateAboutCompanyRequest $request, AboutCompany $aboutCompany)
    {
        DB::beginTransaction();
        try {
            $this->service->update($aboutCompany, $request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.aboutCompanies.index')->with('success', trans('messages.success_updated'));
    }

    public function destroy(AboutCompany $aboutCompany)
    {
        try {
            DB::transaction(function () use ($aboutCompany) {
                return $this->service->delete($aboutCompany);
            });
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.aboutCompanies.index')->with('success', trans('messages.success_deleted'));
    }
}
