<?php

namespace App\Services\Admin;

use App\Models\Komek;
use App\Services\FileService;
use App\Services\TranslateService;

class KomekService
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
        return Komek::query()->create([
            'title' => $data['title'],
            'title_kz' => $data['title_kz'],
            'text' => $data['text'],
            'text_kz' => $data['text_kz'],
            'image' => $this->fileService->saveFile($data['image'], Komek::IMAGE_PATH),
            'form_image' => $this->fileService->saveFile($data['form_image'], Komek::IMAGE_PATH),
        ]);
    }

    public function update(Komek $komek, array $data)
    {
        $komek->title = $data['title'];
        $komek->title_kz = $data['title_kz'];
        $komek->text = $data['text'];
        $komek->text_kz = $data['text_kz'];
        if (isset($data['image'])) {
            $komek->image = $this->fileService->saveFile($data['image'], Komek::IMAGE_PATH, $komek->image);
        }
        if (isset($data['form_image'])) {
            $komek->form_image = $this->fileService->saveFile($data['form_image'], Komek::IMAGE_PATH, $komek->form_image);
        }
        return $komek->save();
    }

    public function delete(Komek $komek)
    {
        return $komek->delete();
    }
}
