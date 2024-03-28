<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DealerSeo\StoreDealerSeoRequest;
use App\Http\Requests\Admin\DealerSeo\UpdateDealerSeoRequest;
use App\Models\Dealer;
use App\Models\DealerSeo;
use App\Models\CarModel;
use App\Models\User;
use App\Models\City;
use App\Services\Admin\DealerSeoService;
use Illuminate\Support\Facades\DB;

class DealerSeoController extends Controller
{
    public DealerSeoService $service;

    public function __construct(DealerSeoService $aboutBannerService)
    {
        $this->service = $aboutBannerService;
    }

    public function index()
    {
        $data['dealerSeos'] = DealerSeo::all();
        return view('admin.dealerSeos.index', $data);
    }

    public function create()
    {
        $data['dealers'] = Dealer::all();
        return view('admin.dealerSeos.create', $data);
    }

    public function store(StoreDealerSeoRequest $request)
    {
        try {
            $data['dealerSeo'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.dealerSeos.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(DealerSeo $dealerSeo)
    {
        $data['dealers'] = Dealer::all();
        $data['dealerSeo'] = $dealerSeo;
        return view('admin.dealerSeos.edit', $data);
    }

    public function update(UpdateDealerSeoRequest $request, DealerSeo $dealerSeo)
    {
        try {
            DB::transaction(function () use ($request, $dealerSeo) {
               return $this->service->update($dealerSeo,$request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
    //write the destroy function
    public function destroy(DealerSeo $dealerSeo){
        try{
            $dealerSeo->delete();
        }catch(\Exception $exception){
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
}