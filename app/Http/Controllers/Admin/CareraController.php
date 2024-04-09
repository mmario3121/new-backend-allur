<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Carera\StoreCareraRequest;
use App\Http\Requests\Admin\Carera\UpdateCareraRequest;
use App\Models\Carera;
use App\Services\Admin\CareraService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CareraController extends Controller
{
    public CareraService $service;

    public function __construct(CareraService $careraService)
    {
        $this->service = $careraService;
    }

    public function index(Request $request)
    {
        $data['careras'] = Carera::all();
        return view('admin.careras.index', $data);
    }

    public function create()
    {
        return view('admin.careras.create');
    }

    public function store(StoreCareraRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.careras.index')->with('success', trans('messages.success_created'));
    }

    public function edit(Carera $carera)
    {
        return view('admin.careras.edit', ['carera' => $carera]);
    }

    public function update(UpdateCareraRequest $request, Carera $carera)
    {
        DB::beginTransaction();
        try {
            $this->service->update($carera, $request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.careras.index')->with('success', trans('messages.success_updated'));
    }

    public function destroy(Carera $carera)
    {
        try {
            DB::transaction(function () use ($carera) {
                return $this->service->delete($carera);
            });
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.careras.index')->with('success', trans('messages.success_deleted'));
    }
}
