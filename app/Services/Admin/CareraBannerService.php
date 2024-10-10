<?php

namespace App\Services\Admin;

use App\Models\CareraBanner;
use App\Services\FileService;
use App\Services\TranslateService;

class CareraBannerService
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
        return CareraBanner::query()->create([
            'image' => $this->fileService->saveFile($data['image'], CareraBanner::IMAGE_PATH),
            'title' => $data['title'],
            'title_kz' => $data['title_kz'],
            'text' => $data['text'],
            'text_kz' => $data['text_kz'],
        ]);
    }

    public function update(CareraBanner $careraBanner, array $data)
    {
        $careraBanner->title = $data['title'];
        $careraBanner->title_kz = $data['title_kz'];
        $careraBanner->text = $data['text'];
        $careraBanner->text_kz = $data['text_kz'];
        if (isset($data['image'])) {
            $careraBanner->image = $this->fileService->saveFile($data['image'], CareraBanner::IMAGE_PATH, $careraBanner->image);
        }
        return $careraBanner->save();
    }

    public function destroy(CareraBanner $careraBanner)
    {
        return $careraBanner->delete();
    }
}
