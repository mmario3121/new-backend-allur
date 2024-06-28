<?php

namespace App\Services\Admin;

use App\Models\AboutCompany;
use App\Services\FileService;
use App\Services\TranslateService;

class AboutCompanyService
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
            //block1 - title, text, image
            //block2 - title, text, image
            //block3 - title, text, image, card1, card2
            //block4 - title, text, image
            //block5 - title, text, image
            //block6 - title, text, image
        return AboutCompany::query()->create([
            'block1_title' => $data['block1_title'],
            'block1_text' => $data['block1_text'],
            'block1_image' => $this->fileService->saveFile($data['block1_image'], AboutCompany::IMAGE_PATH),
            'block2_title' => $data['block2_title'],
            'block2_text' => $data['block2_text'],
            'block2_image' => $this->fileService->saveFile($data['block2_image'], AboutCompany::IMAGE_PATH),
            'block3_title' => $data['block3_title'],
            'block3_text' => $data['block3_text'],
            'block3_image' => $this->fileService->saveFile($data['block3_image'], AboutCompany::IMAGE_PATH),
            'block3_card1' => $data['block3_card1'],
            'block3_card2' => $data['block3_card2'],
            'block4_title' => $data['block4_title'],
            'block4_text' => $data['block4_text'],
            'block4_image' => $this->fileService->saveFile($data['block4_image'], AboutCompany::IMAGE_PATH),
            'block5_title' => $data['block5_title'],
            'block5_text' => $data['block5_text'],
            'block5_image' => $this->fileService->saveFile($data['block5_image'], AboutCompany::IMAGE_PATH),
            'block6_title' => $data['block6_title'],
            'block6_text' => $data['block6_text'],
            'block6_image' => $this->fileService->saveFile($data['block6_image'], AboutCompany::IMAGE_PATH),
        ]);
    }

    public function update(AboutCompany $aboutCompany, array $data)
    {
        $aboutCompany->block1_title = $data['block1_title'];
        $aboutCompany->block1_title_kz = $data['block1_title_kz'];
        $aboutCompany->block1_text = $data['block1_text'];
        $aboutCompany->block1_text_kz = $data['block1_text_kz'];
        $aboutCompany->block2_title = $data['block2_title'];
        $aboutCompany->block2_title_kz = $data['block2_title_kz'];
        $aboutCompany->block2_text = $data['block2_text'];
        $aboutCompany->block2_text_kz = $data['block2_text_kz'];
        $aboutCompany->block3_title = $data['block3_title'];
        $aboutCompany->block3_title_kz = $data['block3_title_kz'];
        $aboutCompany->block3_text = $data['block3_text'];
        $aboutCompany->block3_text_kz = $data['block3_text_kz'];
        $aboutCompany->block3_card1 = $data['block3_card1'];
        $aboutCompany->block3_card1_kz = $data['block3_card1_kz'];
        $aboutCompany->block3_card1_text = $data['block3_card1_text'];
        $aboutCompany->block3_card1_text_kz = $data['block3_card1_text_kz'];
        $aboutCompany->block3_card2 = $data['block3_card2'];
        $aboutCompany->block3_card2_kz = $data['block3_card2_kz'];
        $aboutCompany->block3_card2_text = $data['block3_card2_text'];
        $aboutCompany->block3_card2_text_kz = $data['block3_card2_text_kz'];
        $aboutCompany->block4_title = $data['block4_title'];
        $aboutCompany->block4_title_kz = $data['block4_title_kz'];
        $aboutCompany->block4_text = $data['block4_text'];
        $aboutCompany->block4_text_kz = $data['block4_text_kz'];
        $aboutCompany->block5_title = $data['block5_title'];
        $aboutCompany->block5_title_kz = $data['block5_title_kz'];
        $aboutCompany->block5_text = $data['block5_text'];
        $aboutCompany->block5_text_kz = $data['block5_text_kz'];
        $aboutCompany->block6_title = $data['block6_title'];
        $aboutCompany->block6_title_kz = $data['block6_title_kz'];
        $aboutCompany->block6_text = $data['block6_text'];
        $aboutCompany->block6_text_kz = $data['block6_text_kz'];
        if (isset($data['block1_image'])) {
            $aboutCompany->block1_image = $this->fileService->saveFile($data['block1_image'], AboutCompany::IMAGE_PATH, $aboutCompany->block1_image);
        }
        if (isset($data['block2_image'])) {
            $aboutCompany->block2_image = $this->fileService->saveFile($data['block2_image'], AboutCompany::IMAGE_PATH, $aboutCompany->block2_image);
        }
        if (isset($data['block3_image'])) {
            $aboutCompany->block3_image = $this->fileService->saveFile($data['block3_image'], AboutCompany::IMAGE_PATH, $aboutCompany->block3_image);
        }
        if (isset($data['block4_image'])) {
            $aboutCompany->block4_image = $this->fileService->saveFile($data['block4_image'], AboutCompany::IMAGE_PATH, $aboutCompany->block4_image);
        }
        if (isset($data['block5_image'])) {
            $aboutCompany->block5_image = $this->fileService->saveFile($data['block5_image'], AboutCompany::IMAGE_PATH, $aboutCompany->block5_image);
        }
        if (isset($data['block6_image'])) {
            $aboutCompany->block6_image = $this->fileService->saveFile($data['block6_image'], AboutCompany::IMAGE_PATH, $aboutCompany->block6_image);
        }

        return $aboutCompany->save();
    }

    public function delete(AboutCompany $aboutCompany)
    {
        return $aboutCompany->delete();
    }
}
