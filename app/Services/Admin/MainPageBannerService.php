<?php

namespace App\Services\Admin;

use App\Models\MainPageBanner;
use App\Services\FileService;
use App\Services\TranslateService;

class MainPageBannerService
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
        if (isset($data['image'])) {
            $data['image'] = $this->fileService->saveFile($data['image'], MainPageBanner::IMAGE_PATH);
        }else{
            $data['image'] = null;
        }
        if (isset($data['mobile_image'])) {
            $data['mobile_image'] = $this->fileService->saveFile($data['mobile_image'], MainPageBanner::IMAGE_PATH);
        }else{
            $data['mobile_image'] = null;
        }

        return MainPageBanner::query()->create([
            'image' => $data['image'],
            'mobile_image' => $data['mobile_image'],
            'title' => $data['title'],
            'title_kz' => $data['title_kz'],
            'description' => $data['description'],
            'description_kz' => $data['description_kz'],
            'link' => $data['link'],
            'model_id' => $data['model_id'],
        ]);
    }

    public function update(MainPageBanner $banner, array $data)
    {
        $banner->title = $data['title'];
        $banner->title_kz = $data['title_kz'];
        $banner->description = $data['description'];
        $banner->description_kz = $data['description_kz'];
        $banner->link = $data['link'];
        $banner->model_id = $data['model_id'];
        if (isset($data['image'])) {
            $banner->image = $this->fileService->saveFile($data['image'], MainPageBanner::IMAGE_PATH, $banner->image);
        }
        if (isset($data['mobile_image'])) {
            $banner->mobile_image = $this->fileService->saveFile($data['mobile_image'], MainPageBanner::IMAGE_PATH, $banner->mobile_image);
        }
        return $banner->save();
    }

    public function delete(MainPageBanner $banner)
    {
        return $banner->delete();
    }
}
