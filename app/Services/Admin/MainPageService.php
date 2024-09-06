<?php

namespace App\Services\Admin;

use App\Models\MainPage;
use App\Services\FileService;
use App\Services\TranslateService;

class MainPageService
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
        return MainPage::query()->create([
            'video' => $this->fileService->saveFile($data['video'], MainPage::IMAGE_PATH),
            'mobile_video' => $this->fileService->saveFile($data['mobile_video'], MainPage::IMAGE_PATH),
            'finance_photo' => $this->fileService->saveFile($data['finance_photo'], MainPage::IMAGE_PATH),
            'career_photo1' => $this->fileService->saveFile($data['career_photo1'], MainPage::IMAGE_PATH),
            'career_photo2' => $this->fileService->saveFile($data['career_photo2'], MainPage::IMAGE_PATH),
            'career_photo3' => $this->fileService->saveFile($data['career_photo3'], MainPage::IMAGE_PATH),
            'career_title' => $data['career_title'],
            'career_title_kz' => $data['career_title_kz'],
            'finance_title' => $data['finance_title'],
            'consultation_photo' => $this->fileService->saveFile($data['consultation_photo'], MainPage::IMAGE_PATH),
        ]);
    }

    public function update(MainPage $mainPage, array $data)
    {
        $mainPage->production_title = $data['production_title'];
        $mainPage->production_title_kz = $data['production_title_kz'];
        $mainPage->production_description = $data['production_description'];
        $mainPage->production_description_kz = $data['production_description_kz'];
        if (isset($data['production_images'])) {
            $imgs = [];
            foreach($data['production_images'] as $file)
            {
                $imgs[] = $this->fileService->saveFile($file, MainPage::IMAGE_PATH);
            }
            $mainPage->production_image = $imgs;
        }

        return $mainPage->save();
    }

    public function delete(MainPage $mainPage)
    {
        return $mainPage->delete();
    }
}
