<?php

namespace App\Services\Admin;

use App\Models\CompanySlider;
use App\Services\FileService;
use App\Services\TranslateService;

class CompanySliderService
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
        return CompanySlider::query()->create([
            'image' => $this->fileService->saveFile($data['image'], CompanySlider::IMAGE_PATH),
            'image_mob' => $this->fileService->saveFile($data['image_mob'], CompanySlider::IMAGE_PATH),
            'title' => $data['title'],
            'title_kz' => $data['title_kz'],
            'position' => $data['position'],
        ]);
    }

    public function update(CompanySlider $companySlider, array $data)
    {
        $companySlider->title = $data['title'];
        $companySlider->title_kz = $data['title_kz'];
        $companySlider->position = $data['position'];
        if (isset($data['image'])) {
            $companySlider->image = $this->fileService->saveFile($data['image'], CompanySlider::IMAGE_PATH, $companySlider->image);
        }
        if (isset($data['image_mob'])) {
            $companySlider->image_mob = $this->fileService->saveFile($data['image_mob'], CompanySlider::IMAGE_PATH, $companySlider->image_mob);
        }
        return $companySlider->save();
    }

    public function destroy(CompanySlider $companySlider)
    {
        return $companySlider->delete();
    }
}
