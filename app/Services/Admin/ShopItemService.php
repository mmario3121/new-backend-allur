<?php

namespace App\Services\Admin;

use App\Models\ShopItem;
use App\Services\FileService;

class ShopItemService
{
    protected FileService $fileService;
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function create(array $data)
    {
        return ShopItem::query()->create([
            'title' => $data['title'],
            'article' => $data['article'],
            'color' => $data['color'],
            'size' => $data['size'],
            'price' => $data['price'],
            'description' => $data['description'],
            'image' => $this->fileService->saveFile($data['image'], ShopItem::IMAGE_PATH),
            'category' => $data['category'],
            'shop_item_id' => $data['shop_item_id'],
        ]);
    }

    public function update(ShopItem $shopItem, array $data)
    {
        $shopItem->title = $data['title'];
        $shopItem->article = $data['article'];
        $shopItem->color = $data['color'];
        $shopItem->size = $data['size'];
        $shopItem->price = $data['price'];
        $shopItem->description = $data['description'];
        if (isset($data['image'])) {
            $shopItem->image = $this->fileService->saveFile($data['image'], ShopItem::IMAGE_PATH, $shopItem->image);
        }
        $shopItem->category = $data['category'];
        $shopItem->shop_item_id = $data['shop_item_id'];

        return $shopItem->save();
    }

    public function delete(ShopItem $shopItem)
    {
        return $shopItem->delete();
    }
}
