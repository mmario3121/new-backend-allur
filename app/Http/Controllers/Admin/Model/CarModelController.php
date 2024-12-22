<?php

namespace App\Http\Controllers\Admin\Model;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarModel\StoreCarModelRequest;
use App\Http\Requests\Admin\CarModel\UpdateCarModelRequest;
use App\Models\CarModel;
use App\Models\CarType;
use App\Models\SEO;
use App\Services\Admin\Model\CarModelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Models\Brand;

class CarModelController extends Controller
{
    public CarModelService $service;

    public function __construct(CarModelService $modelService)
    {
        $this->service = $modelService;
    }

    public function index(Request $request)
    {

        $data['models'] = CarModel::query()
        ->where('brand_id', $request->brand_id ?? null)
        ->withCount('sliders')
        ->get();
        return view('admin.models.index', $data);
    }

    public function create()
    {
        $types = CarType::query()->get();
        $brands = Brand::query()->get();
        return view('admin.models.create', ['types' => $types, 'brands' => $brands]);
    }

    public function store(StoreCarModelRequest $request)
    {
        try {
            $data['model'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.models.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(CarModel $model): View
    {
        $types = CarType::query()->get();
        $brands = Brand::query()->get();
        $seo = SEO::query()->where('page', $model->slug)->first();
        return view('admin.models.edit', ['model' => $model, 'types' => $types, 'brands' => $brands, 'seo' => $seo]);
    }

    public function update(UpdateCarModelRequest $request, CarModel $model)
    {
        try {
            DB::transaction(function () use ($request, $model) {
               return $this->service->update($model, $request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.models.edit', $model)
        ->with('success', trans('messages.success_created'));
    }

    public function destroy(CarModel $model)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($model);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.models.index')->with('success', trans('messages.success_deleted'));
    }

}
