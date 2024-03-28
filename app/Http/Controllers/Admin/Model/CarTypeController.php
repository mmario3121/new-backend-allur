<?php

namespace App\Http\Controllers\Admin\Model;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarType\StoreCarTypeRequest;
use App\Http\Requests\Admin\CarType\UpdateCarTypeRequest;
use App\Models\CarType;
use App\Services\Admin\Model\CarTypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class CarTypeController extends Controller
{
    public CarTypeService $service;

    public function __construct(CarTypeService $modelService)
    {
        $this->service = $modelService;
    }
    public function index()
    {
        $data['types'] = CarType::query()->get();
        return view('admin.types.index', $data);
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function store(StoreCarTypeRequest $request)
    {
        try {
            $data['type'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.types.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(CarType $type): View
    {
        return view('admin.types.edit', ['type' => $type]);
    }

    public function update(UpdateCarTypeRequest $request, CarType $type)
    {
        try {
            DB::transaction(function () use ($request, $type) {
               return $this->service->update($type,$request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }

    public function destroy(CarType $type)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($type->load(['titleTranslate', 'descriptionTranslate']));
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.types.index')->with('success', trans('messages.success_deleted'));
    }
}
