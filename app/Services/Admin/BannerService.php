<?php

namespace App\Services\Admin;

use App\Models\Banner;
use App\Services\FileService;
use App\Services\TranslateService;

class BannerService
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
        return Banner::query()->create([
            'image' => $this->fileService->saveFile($data['image'], Banner::IMAGE_PATH),
            'image_kz' => $this->fileService->saveFile($data['image_kz'], Banner::IMAGE_PATH),
            'title' => $data['title'],
            'title_kz' => $data['title_kz'],
            'slug' => $data['slug'],
        ]);
    }

    public function update(Banner $banner, array $data)
    {
        $banner->title = $data['title'];
        $banner->title_kz = $data['title_kz'];
        $banner->slug = $data['slug'];
        if (isset($data['image'])) {
            $banner->image = $this->fileService->saveFile($data['image'], Banner::IMAGE_PATH, $banner->image);
        }
        if (isset($data['image_kz'])) {
            $banner->image_kz = $this->fileService->saveFile($data['image_kz'], Banner::IMAGE_PATH, $banner->image_kz);
        }
        return $banner->save();
    }

    public function delete(Banner $banner)
    {
        return $banner->delete();
    }
}
