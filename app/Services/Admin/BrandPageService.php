<?php

namespace App\Services\Admin;

use App\Models\BrandPage;
use App\Services\FileService;

class BrandPageService
{
    protected FileService $fileService;
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function create(array $data)
    {
        return BrandPage::query()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'title_kz' => $data['title_kz'],
            'description_kz' => $data['description_kz'],
            'image' => $this->fileService->saveFile($data['image'], BrandPage::IMAGE_PATH),
            'brand_id' => $data['brand_id'],
        ]);
    }

    public function update(BrandPage $brand, array $data)
    {
        $brand->title = $data['title'];
        $brand->description = $data['description'];
        $brand->title_kz = $data['title_kz'];
        $brand->description_kz = $data['description_kz'];
        if (isset($data['image'])) {
            $brand->image = $this->fileService->saveFile($data['image'], BrandPage::IMAGE_PATH, $brand->image);
        }
        $brand->brand_id = $data['brand_id'];

        return $brand->save();
    }

    public function delete(BrandPage $brand)
    {
        return $brand->delete();
    }
}
