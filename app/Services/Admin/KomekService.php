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
            'card1' => $data['card1'],
            'card2' => $data['card2'],
            'card3' => $data['card3'],
            'card4' => $data['card4'],
            'card5' => $data['card5'],
            'card6' => $data['card6'],
        ]);
    }

    public function update(Komek $komek, array $data)
    {
        $komek->title = $data['title'];
        $komek->title_kz = $data['title_kz'];
        $komek->text = $data['text'];
        $komek->text_kz = $data['text_kz'];
        $komek->card1 = $data['card1'];
        $komek->card2 = $data['card2'];
        $komek->card3 = $data['card3'];
        $komek->card4 = $data['card4'];
        $komek->card5 = $data['card5'];
        $komek->card6 = $data['card6'];
        $komek->services = json_encode($data['services']);
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
