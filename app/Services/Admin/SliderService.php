<?php

namespace App\Services\Admin;

use App\Models\Slider;
use App\Services\FileService;
use App\Services\TranslateService;

class SliderService
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
        return Slider::query()->create([
            'image' => $this->fileService->saveFile($data['image'], Slider::IMAGE_PATH),
            'image_mob' => $this->fileService->saveFile($data['image_mob'], Slider::IMAGE_PATH),
            'image_kz' => $this->fileService->saveFile($data['image'], Slider::IMAGE_PATH),
            'image_mob_kz' => $this->fileService->saveFile($data['image_mob'], Slider::IMAGE_PATH),
            'link' => $data['link'],
            'position' => $data['position'],
        ]);
    }

    public function update(Slider $slider, array $data)
    {
        $slider->link = $data['link'];
        $slider->position = $data['position'];
        if (isset($data['image'])) {
            $slider->image = $this->fileService->saveFile($data['image'], Slider::IMAGE_PATH, $slider->image);
        }
        if (isset($data['image_mob'])) {
            $slider->image_mob = $this->fileService->saveFile($data['image_mob'], Slider::IMAGE_PATH, $slider->image_mob);
        }
        if (isset($data['image_kz'])) {
            $slider->image_kz = $this->fileService->saveFile($data['image_kz'], Slider::IMAGE_PATH, $slider->image_kz);
        }
        if (isset($data['image_mob_kz'])) {
            $slider->image_mob_kz = $this->fileService->saveFile($data['image_mob_kz'], Slider::IMAGE_PATH, $slider->image_mob_kz);
        }
        return $slider->save();
    }

    public function destroy(Slider $slider)
    {
        return $slider->delete();
    }
}
