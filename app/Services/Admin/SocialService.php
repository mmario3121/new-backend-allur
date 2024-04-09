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
            'block1_title' => $data['block1_title'],
            'block1_image' => $this->fileService->saveFile($data['block1_image'], Social::IMAGE_PATH),
            'block1_text' => $data['block1_text'],
            'block2_title' => $data['block2_title'],
            'block2_image' => $this->fileService->saveFile($data['block2_image'], Social::IMAGE_PATH),
            'block2_text' => $data['block2_text'],
            'block3_title' => $data['block3_title'],
            'block3_image' => $this->fileService->saveFile($data['block3_image'], Social::IMAGE_PATH),
            'block3_text' => $data['block3_text'],
            'block4_title' => $data['block4_title'],
            'block4_image' => $this->fileService->saveFile($data['block4_image'], Social::IMAGE_PATH),
            'block4_text' => $data['block4_text'],
        ]);
    }

    public function update(Social $social, array $data)
    {
        $social->block1_title = $data['block1_title'];
        $social->block1_text = $data['block1_text'];
        $social->block2_title = $data['block2_title'];
        $social->block2_text = $data['block2_text'];
        $social->block3_title = $data['block3_title'];
        $social->block3_text = $data['block3_text'];
        $social->block4_title = $data['block4_title'];
        $social->block4_text = $data['block4_text'];
        
        if (isset($data['block1_image'])) {
            $social->block1_image = $this->fileService->saveFile($data['block1_image'], Social::IMAGE_PATH);
        }

        if (isset($data['block2_image'])) {
            $social->block2_image = $this->fileService->saveFile($data['block2_image'], Social::IMAGE_PATH);
        }

        if (isset($data['block3_image'])) {
            $social->block3_image = $this->fileService->saveFile($data['block3_image'], Social::IMAGE_PATH);
        }

        if (isset($data['block4_image'])) {
            $social->block4_image = $this->fileService->saveFile($data['block4_image'], Social::IMAGE_PATH);
        }

        return $social->save();
    }

    public function delete(Social $social)
    {
        return $social->delete();
    }
}
