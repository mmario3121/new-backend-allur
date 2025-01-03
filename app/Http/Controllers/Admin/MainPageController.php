<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MainPage\StoreMainPageRequest;
use App\Http\Requests\Admin\MainPage\UpdateMainPageRequest;
use App\Models\MainPage;
use App\Models\MainPageBanner;
use App\Services\Admin\MainPageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SEO;

class MainPageController extends Controller
{
    public MainPageService $service;

    public function __construct(MainPageService $mainPageService)
    {
        $this->service = $mainPageService;
    }

    public function index(Request $request)
    {
        $data['mainPages'] = MainPage::all();
        $data['mainPageBanners'] = MainPageBanner::all();
        return view('admin.mainPages.index', $data);
    }

    public function create()
    {
        return view('admin.mainPages.create');
    }

    public function store(StoreMainPageRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.mainPages.index')->with('success', trans('messages.success_created'));
    }

    public function edit(MainPage $mainPage)
    {
        $data['mainPageBanners'] = MainPageBanner::all();
        $data['mainPage'] = $mainPage;
        $data['seo'] = SEO::query()->where('page', 'main_page')->first();
        if (!$data['seo']) {
            $data['seo'] = SEO::query()->create([
                'page' => 'main_page',
                'title' => '',
                'description' => '',
                'keywords' => '',
            ]);
        }
        return view('admin.mainPages.edit', $data);
    }

    public function update(UpdateMainPageRequest $request, MainPage $mainPage)
    {
        DB::beginTransaction();
        try {
            $this->service->update($mainPage, $request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.mainPages.edit', $mainPage)->with('success', trans('messages.success_updated'));
    }

    public function destroy(MainPage $mainPage)
    {
        try {
            DB::transaction(function () use ($mainPage) {
                return $this->service->delete($mainPage);
            });
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.mainPages.index')->with('success', trans('messages.success_deleted'));
    }
}
