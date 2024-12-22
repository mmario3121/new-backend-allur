<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Carreer\StoreCarreerRequest;
use App\Http\Requests\Admin\Carreer\UpdateCarreerRequest;
use App\Models\Carreer;
use App\Models\CarreerKz;
use App\Models\SEO;
use App\Services\Admin\CarreerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarreerController extends Controller
{
    public CarreerService $service;

    public function __construct(CarreerService $carreerService)
    {
        $this->service = $carreerService;
    }

    public function index(Request $request)
    {
        $data['carreers'] = Carreer::all();
        return view('admin.carreers.index', $data);
    }

    public function create()
    {
        return view('admin.carreers.create');
    }

    public function store(StoreCarreerRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.carreers.index')->with('success', trans('messages.success_created'));
    }

    public function edit(Carreer $carreer)
    {
        $carreer_kz = CarreerKz::first();
        $seo = SEO::query()->where('page', 'production')->first();
        return view('admin.carreers.edit', ['carreer' => $carreer, 'carreer_kz' => $carreer_kz, 'seo' => $seo]);
    }

    public function update(UpdateCarreerRequest $request, Carreer $carreer)
    {
        DB::beginTransaction();
        try {
            $this->service->update($carreer, $request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.carreers.index')->with('success', trans('messages.success_updated'));
    }

    public function destroy(Carreer $carreer)
    {
        try {
            DB::transaction(function () use ($carreer) {
                return $this->service->delete($carreer);
            });
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.carreers.index')->with('success', trans('messages.success_deleted'));
    }
}
