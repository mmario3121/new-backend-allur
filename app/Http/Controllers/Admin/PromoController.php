<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Promo\StorePromoRequest;
use App\Http\Requests\Admin\Promo\UpdatePromoRequest;
use App\Models\Promo;
use App\Services\Admin\PromoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromoController extends Controller
{
    public PromoService $service;

    public function __construct(PromoService $promoService)
    {
        $this->service = $promoService;
    }

    public function index(Request $request)
    {
        $data['promos'] = Promo::all();
        return view('admin.promos.index', $data);
    }

    public function create()
    {
        return view('admin.promos.create');
    }

    public function store(StorePromoRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.promos.index')->with('success', trans('messages.success_created'));
    }

    public function edit(Promo $promo)
    {
        return view('admin.promos.edit', ['promo' => $promo]);
    }

    public function update(UpdatePromoRequest $request, Promo $promo)
    {
        DB::beginTransaction();
        try {
            $this->service->update($promo, $request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.promos.index')->with('success', trans('messages.success_updated'));
    }

    public function destroy(Promo $promo)
    {
        try {
            DB::transaction(function () use ($promo) {
                return $this->service->delete($promo);
            });
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.promos.index')->with('success', trans('messages.success_deleted'));
    }
}
