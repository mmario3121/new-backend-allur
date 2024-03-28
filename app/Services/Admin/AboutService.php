<?php

namespace App\Services\Admin;

use App\Models\About;
use App\Services\FileService;
use App\Services\TranslateService;

class AboutService
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
        return About::query()->create([
            'title' => $data['title'],
            'title_kz' => $data['title_kz'],
            'text' => $data['text'],
            'text_kz' => $data['text_kz'],
            'image' => $this->fileService->saveFile($data['image'], About::IMAGE_PATH),
            'position' => $data['position'],
        ]);
    }

    public function update(About $about, array $data)
    {
        $about->title = $data['title'];
        $about->title_kz = $data['title_kz'];
        $about->text = $data['text'];
        $about->text_kz = $data['text_kz'];
        $about->position = $data['position'];
        if (isset($data['image'])) {
            $about->image = $this->fileService->saveFile($data['image'], About::IMAGE_PATH, $about->image);
        }
        return $about->save();
    }

    public function delete(About $about)
    {
        return $about->delete();
    }
}
