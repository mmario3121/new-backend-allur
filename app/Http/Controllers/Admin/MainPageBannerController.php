<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MainPageBanner\StoreMainPageBannerRequest;
use App\Http\Requests\Admin\MainPageBanner\UpdateMainPageBannerRequest;
use App\Models\MainPageBanner;
use App\Models\CarModel;
use App\Services\Admin\MainPageBannerService;
use Illuminate\Support\Facades\DB;

class MainPageBannerController extends Controller
{
    public MainPageBannerService $service;

    public function __construct(MainPageBannerService $aboutMainPageBannerService)
    {
        $this->service = $aboutMainPageBannerService;
    }

    public function index()
    {
        $data['mainPageBanners'] = MainPageBanner::all();
        return view('admin.mainPageBanners.index', $data);
    }

    public function create()
    {
        $data['models'] = CarModel::all();
        return view('admin.mainPageBanners.create', $data);
    }

    public function store(StoreMainPageBannerRequest $request)
    {
        try {
            $data['mainPageBanner'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.mainPageBanners.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(MainPageBanner $mainPageBanner)
    {
        $data['models'] = CarModel::all();
        $data['mainPageBanner'] = $mainPageBanner;
        return view('admin.mainPageBanners.edit', $data);
    }

    public function update(UpdateMainPageBannerRequest $request, MainPageBanner $mainPageBanner)
    {
        try {
            DB::transaction(function () use ($request, $mainPageBanner) {
               return $this->service->update($mainPageBanner,$request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
    //write the destroy function
    public function destroy(MainPageBanner $mainPageBanner){
        try{
            $mainPageBanner->delete();
        }catch(\Exception $exception){
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
}