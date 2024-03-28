<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleImage\StoreArticleImageRequest;
use App\Http\Requests\Admin\ArticleImage\UpdateArticleImageRequest;
use App\Models\Article;
use App\Models\ArticleImage;
use App\Services\Admin\Article\ArticleImageService;
use Illuminate\Support\Facades\DB;

class ArticleImageController extends Controller
{
    public ArticleImageService $service;

    public function __construct(ArticleImageService $articleService)
    {
        $this->service = $articleService;
    }

    public function index(Article $article)
    {
        $articleImages = ArticleImage::query()
            ->where('article_id', '=', $article->id)
            ->get();

        return view('admin.articleImages.index', [
            'article' => $article,
            'articleImages' => $articleImages
        ]);
    }

    public function create(Article $article)
    {
//        $lastArticleImage = ArticleImage::query()
//            ->where('article_id', '=', $article->id)
//            ->latest()
//            ->first();

        return view('admin.articleImages.create', [
            'article' => $article
//            'lastArticleImage' => $lastArticleImage
        ]);
    }

    public function store(StoreArticleImageRequest $request, Article $article)
    {
        DB::beginTransaction();
        try {
            $this->service->create($article, $request->validated());

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.articleImages.index', ['article' => $article])
            ->with('success', trans('messages.success_created'));
    }

    public function edit(Article $article, ArticleImage $articleImage)
    {
//        $lastArticle = ArticleImage::query()->latest()->first();
        return view('admin.articleImages.edit', [
            'article' => $article,
            'articleImage' => $articleImage,
//            'lastArticle' => $lastArticle
        ]);
    }

    public function update(UpdateArticleImageRequest $request, Article $article, ArticleImage $articleImage)
    {
        DB::beginTransaction();
        try {
            $this->service->update($article, $articleImage, $request->validated());

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.articleImages.index', ['article' => $article])
            ->with('success', trans('messages.success_updated'));
    }

    public function destroy(Article $article, ArticleImage $articleImage)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($articleImage);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.articleImages.index', ['article' => $article])
            ->with('success', trans('messages.success_deleted'));
    }

}
