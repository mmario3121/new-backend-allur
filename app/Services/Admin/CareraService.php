<?php

namespace App\Services\Admin;

use App\Models\Carera;
use App\Services\FileService;
use App\Services\TranslateService;

class CareraService
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
         //10 blocks with image, title, description
        //4 cards
        return Carera::query()->create([
            'block1_title' => $data['block1_title'],
            'block1_text' => $data['block1_text'],
            'block1_image' => $this->fileService->saveFile($data['block1_image'], Carera::IMAGE_PATH),
            'block2_title' => $data['block2_title'],
            'block2_text' => $data['block2_text'],
            'block2_image' => $this->fileService->saveFile($data['block2_image'], Carera::IMAGE_PATH),
            'block3_image' => $this->fileService->saveFile($data['block3_image'], Carera::IMAGE_PATH),
        ]);
    }

    public function update(Carera $carera, array $data)
    {
        $carera->block1_title = $data['block1_title'];
        $carera->block1_text = $data['block1_text'];
        $carera->block2_title = $data['block2_title'];
        $carera->block2_text = $data['block2_text'];
        $carera->block4_title = $data['block4_title'];
        $carera->block4_title_kz = $data['block4_title_kz'];
        $carera->block4_text = $data['block4_text'];
        $carera->block4_text_kz = $data['block4_text_kz'];
        
        if (isset($data['block1_image'])) {
            $carera->block1_image = $this->fileService->saveFile($data['block1_image'], Carera::IMAGE_PATH, $carera->block1_image);
        }
        if (isset($data['block2_image'])) {
            $carera->block2_image = $this->fileService->saveFile($data['block2_image'], Carera::IMAGE_PATH, $carera->block2_image);
        }
        if (isset($data['block3_image'])) {
            $carera->block3_image = $this->fileService->saveFile($data['block3_image'], Carera::IMAGE_PATH, $carera->block3_image);
        }
        if (isset($data['block4_image'])) {
            $carera->block4_image = $this->fileService->saveFile($data['block4_image'], Carera::IMAGE_PATH, $carera->block4_image);
        }
        if (isset($data['block5_image'])) {
            $carera->block5_image = $this->fileService->saveFile($data['block5_image'], Carera::IMAGE_PATH, $carera->block5_image);
        }

        return $carera->save();
    }

    public function delete(Carera $carera)
    {
        return $carera->delete();
    }
}
