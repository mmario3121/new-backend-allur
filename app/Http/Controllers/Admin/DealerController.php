<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dealer\StoreDealerRequest;
use App\Http\Requests\Admin\Dealer\UpdateDealerRequest;
use App\Models\Dealer;
use App\Models\CarModel;
use App\Models\User;
use App\Models\City;
use App\Services\Admin\DealerService;
use Illuminate\Support\Facades\DB;

class DealerController extends Controller
{
    public DealerService $service;

    public function __construct(DealerService $aboutBannerService)
    {
        $this->service = $aboutBannerService;
    }

    public function index()
    {
        $data['dealers'] = Dealer::all();
        return view('admin.dealers.index', $data);
    }

    public function create()
    {
        $data['users'] = User::all();
        $data['cities'] = City::all();
        return view('admin.dealers.create', $data);
    }

    public function store(StoreDealerRequest $request)
    {
        try {
            $data['dealer'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.dealers.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(Dealer $dealer)
    {
        $data['users'] = User::all();
        $data['cities'] = City::all();
        $data['dealer'] = $dealer;
        return view('admin.dealers.edit', $data);
    }

    public function update(UpdateDealerRequest $request, Dealer $dealer)
    {
        try {
            DB::transaction(function () use ($request, $dealer) {
               return $this->service->update($dealer,$request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
    //write the destroy function
    public function destroy(Dealer $dealer){
        try{
            $dealer->delete();
        }catch(\Exception $exception){
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
}