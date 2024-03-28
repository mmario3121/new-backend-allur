<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\StoreBannerRequest;
use App\Http\Requests\Admin\Banner\UpdateBannerRequest;
use App\Models\Banner;
use App\Models\CarModel;
use App\Services\Admin\BannerService;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public BannerService $service;

    public function __construct(BannerService $aboutBannerService)
    {
        $this->service = $aboutBannerService;
    }

    public function index()
    {
        $data['banners'] = Banner::all();
        return view('admin.banners.index', $data);
    }

    public function create()
    {
        $data['models'] = CarModel::all();
        return view('admin.banners.create', $data);
    }

    public function store(StoreBannerRequest $request)
    {
        try {
            $data['banner'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.banners.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(Banner $banner)
    {
        $data['models'] = CarModel::all();
        $data['banner'] = $banner;
        return view('admin.banners.edit', $data);
    }

    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        try {
            DB::transaction(function () use ($request, $banner) {
               return $this->service->update($banner,$request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
    //write the destroy function
    public function destroy(Banner $banner){
        try{
            $banner->delete();
        }catch(\Exception $exception){
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
}