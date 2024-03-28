<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\City\StoreCityRequest;
use App\Http\Requests\Admin\City\UpdateCityRequest;
use App\Models\City;
use App\Services\Admin\City\CityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public CityService $service;

    public function __construct(CityService $cityService)
    {
        $this->service = $cityService;
    }

    public function index(Request $request)
    {
        $data['cities'] = City::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $keywords = explode(' ', $request->input('search'));

                $query->where(function ($query) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $query->whereHas('titleTranslate', function ($query) use ($keyword) {
                            $query->where('ru', 'like', "%$keyword%")
                                ->orWhere('kz', 'like', "%$keyword%");
                        });
                    }
                });
            })
            ->with('titleTranslate')
            ->paginate(25);

        return view('admin.cities.index', $data);
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(StoreCityRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.cities.index')->with('success', trans('messages.success_created'));
    }

    public function edit(City $city)
    {
        return view('admin.cities.edit', ['city' => $city]);
    }

    public function update(UpdateCityRequest $request, City $city)
    {
        DB::beginTransaction();
        try {
            $this->service->update($city, $request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.cities.index')->with('success', trans('messages.success_updated'));
    }

    public function destroy(City $city)
    {
        try {
            DB::transaction(function () use ($city) {
                return $this->service->delete($city);
            });
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.cities.index')->with('success', trans('messages.success_deleted'));
    }
}
