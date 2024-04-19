<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ShopItem\StoreShopItemRequest;
use App\Http\Requests\Admin\ShopItem\UpdateShopItemRequest;
use App\Models\ShopItem;
use App\Services\Admin\ShopItemService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopItemController extends Controller
{
    public ShopItemService $service;

    public function __construct(ShopItemService $shopItemService)
    {
        $this->service = $shopItemService;
    }

    public function index(Request $request)
    {
        if($request->has('shopItem')) {
            $data['shopItems'] = ShopItem::where('shop_item_id', $request->shopItem)->get();
            return view('admin.shopItems.index', $data);
        }
        $data['shopItems'] = ShopItem::where('shop_item_id', null)->get();
        return view('admin.shopItems.index', $data);
    }

    public function create()
    {
        $data['shopItems'] = ShopItem::query()->get();
        return view('admin.shopItems.create', $data);
    }

    public function store(StoreShopItemRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->service->create($request->validated());

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.shopItems.index')->with('success', trans('messages.success_created'));
    }

    public function edit(ShopItem $shopItem)
    {
        return view('admin.shopItems.edit', ['shopItem' => $shopItem]);
    }

    public function update(UpdateShopItemRequest $request, ShopItem $shopItem)
    {
        DB::beginTransaction();
        try {
            $this->service->update($shopItem, $request->validated());

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.shopItems.index')->with('success', trans('messages.success_updated'));
    }

    public function destroy(ShopItem $shopItem)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($shopItem->load(['titleTranslate', 'descriptionTranslate']));
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.shopItems.index')->with('success', trans('messages.success_deleted'));
    }

}
