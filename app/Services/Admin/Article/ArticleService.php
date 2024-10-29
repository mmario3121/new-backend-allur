<?php

namespace App\Services\Admin\Article;

use App\Models\Article;
use App\Services\FileService;
use App\Services\TranslateService;

class ArticleService
{
    protected FileService $fileService;
    protected TranslateService $translateService;

    public function __construct(
        FileService      $fileService,
        TranslateService $translateService
    )
    {
        $this->fileService = $fileService;
        $this->translateService = $translateService;
    }

    public function create(array $data)
    {
        return Article::query()->create([
            'title' => $this->translateService->createTranslate($data['title']),
            'description' => $this->translateService->createTranslate($data['description']),
            'description_mob' => $this->translateService->createTranslate($data['description_mob']),
            'image' => $this->fileService->saveFile($data['image'], Article::IMAGE_PATH),
            'image_kz' => $this->fileService->saveFile($data['image_kz'], Article::IMAGE_PATH),
            'time' => $data['time'],
            'isForm' => isset($data['isForm']) ? 1 : 0,
            //model_id, isFinance, isMainPage, type, banner
            'model_ids' => $data['model_ids'],
            'isFinance' => isset($data['isFinance']) ? 1 : 0,
            'isMainPage' => isset($data['isMainPage']) ? 1 : 0,
            'isSlider' => isset($data['isSlider']) ? 1 : 0,
            'isAbout' => isset($data['isAbout']) ? 1 : 0,
            'isProduction' => isset($data['isProduction']) ? 1 : 0,
            'type' => $data['type'],
            'banner' => isset($data['banner']) ? $this->fileService->saveFile($data['banner'], Article::IMAGE_PATH) : null,
        ]);
    }

    public function update(Article $article, array $data): ?bool
    {
        $article->titleTranslate->update($data['title']);
        $article->descriptionTranslate->update($this->translateService->clearedText($data['description']));
        if($article->descriptionMobTranslate){
            $article->descriptionMobTranslate->update($this->translateService->clearedText($data['description_mob']));
        }else{
            $article->description_mob = $this->translateService->createTranslate($data['description_mob']);
        }
        $article->time = $data['time'];
        if(isset($data['isForm'])){
            $article->isForm = 1;
        }else{
            $article->isForm = 0;
        }
        $article->model_ids = $data['model_ids'];
        if(isset($data['isFinance'])){
            $article->isFinance = 1;
        }else{
            $article->isFinance = 0;
        }
        if(isset($data['isMainPage'])){
            $article->isMainPage = 1;
        }else{
            $article->isMainPage = 0;
        }
        if(isset($data['isSlider'])){
            $article->isSlider = 1;
        }else{
            $article->isSlider = 0;
        }
        if(isset($data['isAbout'])){
            $article->isAbout = 1;
        }else{
            $article->isAbout = 0;
        }
        if(isset($data['isProduction'])){
            $article->isProduction = 1;
        }else{
            $article->isProduction = 0;
        }
        $article->type = $data['type'];
        if (isset($data['image'])) {
            $article->image = $this->fileService->saveFile($data['image'], Article::IMAGE_PATH, $article->image);
        }
        if (isset($data['image_kz'])) {
            $article->image_kz = $this->fileService->saveFile($data['image_kz'], Article::IMAGE_PATH, $article->image_kz);
        }
        if (isset($data['banner'])) {
            $article->banner = $this->fileService->saveFile($data['banner'], Article::IMAGE_PATH, $article->banner);
        }

        return $article->save();
    }

    public function delete(Article $article): ?bool
    {
        $article->titleTranslate->delete();
        $article->descriptionTranslate->delete();
        $article->descriptionMobTranslate->delete();

        if ($article->image != null) {
            $this->fileService->deleteFile($article->image, Article::IMAGE_PATH);
        }

        return $article->delete();
    }
}
