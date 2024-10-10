<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CareraBanner\StoreCareraBannerRequest;
use App\Http\Requests\Admin\CareraBanner\UpdateCareraBannerRequest;
use App\Models\CareraBanner;
use App\Services\Admin\CareraBannerService;
use Illuminate\Support\Facades\DB;

class CareraBannerController extends Controller
{
    public CareraBannerService $service;

    public function __construct(CareraBannerService $aboutBannerService)
    {
        $this->service = $aboutBannerService;
    }

    public function index()
    {
        $data['careraBanners'] = CareraBanner::all();
        return view('admin.careraBanners.index', $data);
    }

    public function create()
    {
        return view('admin.careraBanners.create');
    }

    public function store(StoreCareraBannerRequest $request)
    {
        try {
            $data['careraBanner'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.careraBanners.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(CareraBanner $careraBanner)
    {
        return view('admin.careraBanners.edit', ['careraBanner' => $careraBanner]);
    }

    public function update(UpdateCareraBannerRequest $request, CareraBanner $careraBanner)
    {
        try {
            DB::transaction(function () use ($request, $careraBanner) {
               return $this->service->update($careraBanner,$request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }

    //destroy function
    public function destroy(CareraBanner $careraBanner){
        try {
            DB::transaction(function () use ($careraBanner) {
               return $this->service->destroy($careraBanner);
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
}
