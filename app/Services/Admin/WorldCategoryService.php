<?php

namespace App\Services\Admin;

use App\Models\WorldCategory;
use App\Services\FileService;
use App\Services\TranslateService;

class WorldCategoryService
{
    protected FileService $fileService;
    protected TranslateService $translateService;

    public function __construct(FileService $fileService, TranslateService $translateService)
    {
        $this->fileService = $fileService;
        $this->translateService = $translateService;
    }

    public function create(array $data)
    {
        return WorldCategory::query()->create([
            'image' => $this->fileService->saveFile($data['image'], WorldCategory::IMAGE_PATH),
            'image_mob' => $this->fileService->saveFile($data['image_mob'], WorldCategory::IMAGE_PATH),
            'cover_photo' => $this->fileService->saveFile($data['cover_photo'], WorldCategory::IMAGE_PATH),
            'main_page_image' => $this->fileService->saveFile($data['main_page_image'], WorldCategory::IMAGE_PATH),
            'title' => $data['title'],
            'title_kz' => $data['title_kz'],
            'slug' => $data['slug'],
        ]);
    }

    public function update(WorldCategory $worldCategory, array $data)
    {
        $worldCategory->title = $data['title'];
        $worldCategory->title_kz = $data['title_kz'];
        if (isset($data['image'])) {
            $worldCategory->image = $this->fileService->saveFile($data['image'], WorldCategory::IMAGE_PATH, $worldCategory->image);
        }
        if (isset($data['image_mob'])) {
            $worldCategory->image_mob = $this->fileService->saveFile($data['image_mob'], WorldCategory::IMAGE_PATH, $worldCategory->image_mob);
        }
        if (isset($data['cover_photo'])) {
            $worldCategory->cover_photo = $this->fileService->saveFile($data['cover_photo'], WorldCategory::IMAGE_PATH, $worldCategory->cover_photo);
        }
        if (isset($data['main_page_image'])) {
            $worldCategory->main_page_image = $this->fileService->saveFile($data['main_page_image'], WorldCategory::IMAGE_PATH, $worldCategory->main_page_image);
        }
        return $worldCategory->save();
    }

    public function delete(WorldCategory $worldCategory)
    {
        return $worldCategory->delete();
    }
}
