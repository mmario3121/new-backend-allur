<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider\StoreSliderRequest;
use App\Http\Requests\Admin\Slider\UpdateSliderRequest;
use App\Models\Slider;
use App\Services\Admin\SliderService;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public SliderService $service;

    public function __construct(SliderService $aboutBannerService)
    {
        $this->service = $aboutBannerService;
    }

    public function index()
    {
        $data['sliders'] = Slider::all();
        return view('admin.sliders.index', $data);
    }

    public function create()
    {

        return view('admin.sliders.create');
    }

    public function store(StoreSliderRequest $request)
    {
        try {
            $data['slider'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.sliders.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', ['slider' => $slider]);
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        try {
            DB::transaction(function () use ($request, $slider) {
               return $this->service->update($slider,$request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }

    //destroy function
    public function destroy(Slider $slider){
        try {
            DB::transaction(function () use ($slider) {
               return $this->service->destroy($slider);
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
}
