<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\V1\BannerResource;
use App\Http\Resources\V1\ArticleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    public function getBySlug(Request $request){
        $article = Article::where('slug', $request->slug)->first();
        if($article == null){
            return 'Not Found';
        }
        $data['article'] = new ArticleResource($article);
        return new JsonResponse($data, Response::HTTP_OK);
    }
    public function getAll(Request $request){
        $type = $request->type;
        if ($type == null || $type == 'all'){
            $data['articles'] = ArticleResource::collection(
                Article::orderBy('time', 'desc')->get()
            );
        }else{
            $data['articles'] = ArticleResource::collection(
                Article::where('type', $type)
                ->orderBy('time', 'desc')->get()
            );
        }
        
        $data['slider'] = ArticleResource::collection(
            Article::where('isSlider', 1)->get()
        );
        return new JsonResponse($data, Response::HTTP_OK);
    }

}
