<?php

namespace App\Services\Admin;

use App\Models\Social;
use App\Services\FileService;
use App\Services\TranslateService;

class SocialService
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
        
        return Social::query()->create([
            'title' => $data['title'],
            'title_kz' => $data['title_kz'],
            'text' => $data['text'],
            'text_kz' => $data['text_kz'],
            'image' => $this->fileService->saveFile($data['image'], Social::IMAGE_PATH),
            'type' => $data['type'],
        ]);
    }

    public function update(Social $social, array $data)
    {
        $social->title = $data['title'];
        $social->title_kz = $data['title_kz'];
        $social->text = $data['text'];
        $social->text_kz = $data['text_kz'];
        if (isset($data['image'])) {
            $social->image = $this->fileService->saveFile($data['image'], Social::IMAGE_PATH);
        }
        return $social->save();
    }

    public function delete(Social $social)
    {
        return $social->delete();
    }
}
