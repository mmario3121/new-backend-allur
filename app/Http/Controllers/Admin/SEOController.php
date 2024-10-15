<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SEO\StoreSEORequest;
use App\Http\Requests\Admin\SEO\UpdateSEORequest;
use App\Models\SEO;
use App\Services\Admin\SEO\SEOService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SEOController extends Controller
{
    public SEOService $service;

    public function __construct(SEOService $seoService)
    {
        $this->service = $seoService;
    }

    public function index(Request $request)
    {
        $data['seos'] = SEO::query()
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

        return view('admin.seos.index', $data);
    }

    public function create()
    {
        return view('admin.seos.create');
    }

    public function store(StoreSEORequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.seos.index')->with('success', trans('messages.success_created'));
    }

    public function edit(SEO $seo)
    {
        return view('admin.seos.edit', ['seo' => $seo]);
    }

    public function update(UpdateSEORequest $request, SEO $seo)
    {
        DB::beginTransaction();
        try {
            $this->service->update($seo, $request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.seos.index')->with('success', trans('messages.success_updated'));
    }

    public function destroy(SEO $seo)
    {
        try {
            DB::transaction(function () use ($seo) {
                return $this->service->delete($seo);
            });
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.seos.index')->with('success', trans('messages.success_deleted'));
    }
}
