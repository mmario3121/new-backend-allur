<?php

namespace App\Services\Admin\Article;

use App\Models\Article;
use App\Models\ArticleImage;
use App\Services\FileService;

class ArticleImageService
{
    protected FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function create(Article $article, array $data)
    {
        $articleImage = ArticleImage::query()->create([
            'image' => $this->fileService->saveFile($data['image'], ArticleImage::IMAGE_PATH),
            'position' => isset($data['position']) ? (int)$data['position'] : 0,
            'article_id' => $article->id
        ]);

        $articleImage->save();

        return $articleImage;
    }

    public function update(Article $article, ArticleImage $articleImage, array $data)
    {
        if (isset($data['image'])) {
            $articleImage->image = $this->fileService->saveFile($data['image'], ArticleImage::IMAGE_PATH, $articleImage->image);
        }

        $articleImage->position = isset($data['position']) ? (int)$data['position'] : 0;
        $articleImage->article_id = $article->id;

        return $articleImage->update();
    }

    public function delete(ArticleImage $articleImage)
    {
        if ($articleImage->image != null) {
            $this->fileService->deleteFile($articleImage->image, ArticleImage::IMAGE_PATH);
        }

        return $articleImage->delete();
    }
}
