<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Komek\StoreKomekRequest;
use App\Http\Requests\Admin\Komek\UpdateKomekRequest;
use App\Models\Komek;
use App\Services\Admin\KomekService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KomekController extends Controller
{
    public KomekService $service;

    public function __construct(KomekService $komekService)
    {
        $this->service = $komekService;
    }

    public function index(Request $request)
    {
        $data['komeks'] = Komek::all();
        return view('admin.komeks.index', $data);
    }

    public function create()
    {
        return view('admin.komeks.create');
    }

    public function store(StoreKomekRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.komeks.index')->with('success', trans('messages.success_created'));
    }

    public function edit(Komek $komek)
    {
        return view('admin.komeks.edit', ['komek' => $komek]);
    }

    public function update(UpdateKomekRequest $request, Komek $komek)
    {
        DB::beginTransaction();
        try {
            $this->service->update($komek, $request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.komeks.index')->with('success', trans('messages.success_updated'));
    }

    public function destroy(Komek $komek)
    {
        try {
            DB::transaction(function () use ($komek) {
                return $this->service->delete($komek);
            });
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.komeks.index')->with('success', trans('messages.success_deleted'));
    }
}
