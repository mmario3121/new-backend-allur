<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\StoreArticleRequest;
use App\Http\Requests\Admin\Article\UpdateArticleRequest;
use App\Models\Article;
use App\Services\Admin\Article\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public ArticleService $service;

    public function __construct(ArticleService $articleService)
    {
        $this->service = $articleService;
    }

    public function index(Request $request)
    {
        $data['articles'] = Article::query()
            ->withTranslations()
            ->withCount('articleImages')
            ->when($request->filled('search'), function ($query) use ($request) {
                $keywords = explode(' ', $request->input('search'));

                $query->where(function ($query) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $query->whereHas('titleTranslate', function ($query) use ($keyword) {
                            $query->where('ru', 'like', "%$keyword%")
                                ->orWhere('kz', 'like', "%$keyword%");
                        })->orWhereHas('descriptionTranslate', function ($query) use ($keyword) {
                            $query->where('ru', 'like', "%$keyword%")
                                ->orWhere('kz', 'like', "%$keyword%");
                        })->orWhere('time', 'like', "%$keyword%");
                    }
                });
            })
            ->latest()
            ->paginate(15);

        return view('admin.articles.index', $data);
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(StoreArticleRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->service->create($request->validated());

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.articles.index')->with('success', trans('messages.success_created'));
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', ['article' => $article->load(['titleTranslate', 'descriptionTranslate', 'descriptionMobTranslate'])]);
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        DB::beginTransaction();
        try {
            $this->service->update($article, $request->validated());

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.articles.index')->with('success', trans('messages.success_updated'));
    }

    public function destroy(Article $article)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($article->load(['titleTranslate', 'descriptionTranslate', 'descriptionMobTranslate']));
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.articles.index')->with('success', trans('messages.success_deleted'));
    }

}
