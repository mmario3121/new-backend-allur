<?php

namespace App\Services\Admin;

use App\Models\Brand;
use App\Services\FileService;

class BrandService
{
    protected FileService $fileService;
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function create(array $data)
    {
        return Brand::query()->create([
            'title' => $data['title'],
            'position' => $data['position'],
            'logo' => $this->fileService->saveFile($data['logo'], Brand::IMAGE_PATH),
            'bitrix_id' => $data['bitrix_id'],
        ]);
    }

    public function update(Brand $brand, array $data)
    {
        $brand->title = $data['title'];
        $brand->position = $data['position'];
        if (isset($data['logo'])) {
            $brand->logo = $this->fileService->saveFile($data['logo'], Brand::IMAGE_PATH, $brand->logo);
        }
        $brand->bitrix_id = $data['bitrix_id'];

        return $brand->save();
    }

    public function delete(Brand $brand)
    {
        return $brand->delete();
    }
}
