<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DealerAddress\StoreDealerAddressRequest;
use App\Http\Requests\Admin\DealerAddress\UpdateDealerAddressRequest;
use App\Models\Dealer;
use App\Models\DealerAddress;
use App\Models\CarModel;
use App\Models\User;
use App\Models\City;
use App\Services\Admin\DealerAddressService;
use Illuminate\Support\Facades\DB;

class DealerAddressController extends Controller
{
    public DealerAddressService $service;

    public function __construct(DealerAddressService $aboutBannerService)
    {
        $this->service = $aboutBannerService;
    }

    public function index()
    {
        $data['dealerAddresses'] = DealerAddress::all();
        return view('admin.dealerAddresses.index', $data);
    }

    public function create()
    {
        $data['dealers'] = Dealer::all();
        return view('admin.dealerAddresses.create', $data);
    }

    public function store(StoreDealerAddressRequest $request)
    {
        try {
            $data['dealerAddress'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.dealerAddresses.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(DealerAddress $dealerAddress)
    {
        $data['dealers'] = Dealer::all();
        $data['dealerAddress'] = $dealerAddress;
        return view('admin.dealerAddresses.edit', $data);
    }

    public function update(UpdateDealerAddressRequest $request, DealerAddress $dealerAddress)
    {
        try {
            DB::transaction(function () use ($request, $dealerAddress) {
               return $this->service->update($dealerAddress,$request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
    //write the destroy function
    public function destroy(DealerAddress $dealerAddress){
        try{
            $dealerAddress->delete();
        }catch(\Exception $exception){
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
}