<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FinancePage\StoreFinancePageRequest;
use App\Http\Requests\Admin\FinancePage\UpdateFinancePageRequest;
use App\Models\FinancePage;
use App\Services\Admin\FinancePageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SEO;
class FinancePageController extends Controller
{
    public FinancePageService $service;

    public function __construct(FinancePageService $financePageService)
    {
        $this->service = $financePageService;
    }

    public function index(Request $request)
    {
        $data['financePages'] = FinancePage::all();
        return view('admin.financePages.index', $data);
    }

    public function create()
    {
        return view('admin.financePages.create');
    }

    public function store(StoreFinancePageRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.financePages.index')->with('success', trans('messages.success_created'));
    }

    public function edit(FinancePage $financePage)
    {
        $miniCard5 = $financePage->mini_card_5 ? json_decode($financePage->mini_card_5, true) : [];
        $miniCard6 = $financePage->mini_card_6 ? json_decode($financePage->mini_card_6, true) : [];
        $miniCard7 = $financePage->mini_card_7 ? json_decode($financePage->mini_card_7, true) : [];
        $miniCard8 = $financePage->mini_card_8 ? json_decode($financePage->mini_card_8, true) : [];
        $miniCard9 = $financePage->mini_card_9 ? json_decode($financePage->mini_card_9, true) : [];

        $seo = SEO::query()->where('page', 'finance_page')->first();
        if (!$seo) {
            $seo = SEO::query()->create([
                'page' => 'finance_page',
                'title' => '',
                'description' => '',
                'keywords' => '',
            ]);
        }

        return view('admin.financePages.edit', [
            'financePage' => $financePage,
            'miniCard5' => $miniCard5,
            'miniCard6' => $miniCard6,
            'miniCard7' => $miniCard7,
            'miniCard8' => $miniCard8,
            'miniCard9' => $miniCard9,
            'seo' => $seo,
        ]);
    }

    public function update(UpdateFinancePageRequest $request, FinancePage $financePage)
    {
        DB::beginTransaction();
        try {
            $this->service->update($financePage, $request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.financePages.edit', $financePage)->with('success', trans('messages.success_updated'));
    }

    public function destroy(FinancePage $financePage)
    {
        try {
            DB::transaction(function () use ($financePage) {
                return $this->service->delete($financePage);
            });
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.financePages.index')->with('success', trans('messages.success_deleted'));
    }
}
