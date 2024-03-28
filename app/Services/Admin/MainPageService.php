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
            'finance_photo' => $this->fileService->saveFile($data['finance_photo'], MainPage::IMAGE_PATH),
            'career_photo1' => $this->fileService->saveFile($data['career_photo1'], MainPage::IMAGE_PATH),
            'career_photo2' => $this->fileService->saveFile($data['career_photo2'], MainPage::IMAGE_PATH),
            'career_photo3' => $this->fileService->saveFile($data['career_photo3'], MainPage::IMAGE_PATH),
            'career_title' => $data['career_title'],
            'career_title_kz' => $data['career_title_kz'],
            'consultation_photo' => $this->fileService->saveFile($data['consultation_photo'], MainPage::IMAGE_PATH),
        ]);
    }

    public function update(MainPage $mainPage, array $data)
    {
        $mainPage->career_title = $data['career_title'];
        $mainPage->career_title_kz = $data['career_title_kz'];
        if (isset($data['video'])) {
            $mainPage->video = $this->fileService->saveFile($data['video'], MainPage::IMAGE_PATH, $mainPage->video);
        }
        if (isset($data['finance_photo'])) {
            $mainPage->finance_photo = $this->fileService->saveFile($data['finance_photo'], MainPage::IMAGE_PATH, $mainPage->finance_photo);
        }
        if (isset($data['career_photo1'])) {
            $mainPage->career_photo1 = $this->fileService->saveFile($data['career_photo1'], MainPage::IMAGE_PATH, $mainPage->career_photo1);
        }
        if (isset($data['career_photo2'])) {
            $mainPage->career_photo2 = $this->fileService->saveFile($data['career_photo2'], MainPage::IMAGE_PATH, $mainPage->career_photo2);
        }
        if (isset($data['career_photo3'])) {
            $mainPage->career_photo3 = $this->fileService->saveFile($data['career_photo3'], MainPage::IMAGE_PATH, $mainPage->career_photo3);
        }
        return $mainPage->save();
    }

    public function delete(MainPage $mainPage)
    {
        return $mainPage->delete();
    }
}
