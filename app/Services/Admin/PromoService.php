<?php

namespace App\Services\Admin;

use App\Models\Promo;
use App\Services\FileService;
use App\Services\TranslateService;

class PromoService
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
        $promo = Promo::query()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'link' => $data['link'],
            'title_kz' => $data['title_kz'],
            'description_kz' => $data['description_kz'],
            'title2' => $data['title2'],
            'title2_kz' => $data['title2_kz'],
            'description2' => $data['description2'],
            'description2_kz' => $data['description2_kz'],
            'has_form' => $data['has_form'] ?? 0,
        ]);
        if (isset($data['image'])) {
            $promo->image = $this->fileService->saveFile($data['image'], Promo::IMAGE_PATH);
        }
        if (isset($data['image2'])) {
            $promo->image2 = $this->fileService->saveFile($data['image2'], Promo::IMAGE_PATH);
        }
    }

    public function update(Promo $promo, array $data)
    {
        $promo->title = $data['title'];
        $promo->description = $data['description'];
        $promo->link = $data['link'];
        $promo->title_kz = $data['title_kz'];
        $promo->description_kz = $data['description_kz'];
        $promo->title2 = $data['title2'];
        $promo->title2_kz = $data['title2_kz'];
        $promo->description2 = $data['description2'];
        $promo->description2_kz = $data['description2_kz'];
        $promo->has_form = $data['has_form'] ?? 0;

        if (isset($data['image'])) {
            $promo->image = $this->fileService->saveFile($data['image'], Promo::IMAGE_PATH, $promo->image);
        }
        if (isset($data['image2'])) {
            $promo->image2 = $this->fileService->saveFile($data['image2'], Promo::IMAGE_PATH, $promo->image2);
        }

        return $promo->save();
    }

    public function delete(Promo $promo)
    {
        return $promo->delete();
    }
}
