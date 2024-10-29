<?php

namespace App\Http\Resources\V1;

use App\Models\CarModel;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Article;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang = $request->lang;
        if($lang =='ru'){
            $image = $this->image_url;
        }else{
            $image = $this->image_kz_url;
        }

        $model = $this->model;
        $connectedNews = [];
        $modelId = $this->model_id;
        $models = [];
        if ($modelId != null) {
            $carModel = CarModel::where('id', $modelId)->first();
                $model['title'] = $carModel->title;
                $model['bitrix_id'] = $carModel->bitrix_id;
                $model['brand'] = $carModel->brand->code;
                $models[] = $model;
        }

            $cn = Article::where('id', '!=', $this->id)->orderBy('time', 'desc')->take(20)->get();
            foreach ($cn as $news) {
                $connectedNews[] = [
                    'slug' => $news->slug,
                    'title' => $news->titleTranslate?->{$lang},
                    'description' => $news->descriptionTranslate?->{$lang},
                    'description_mob' => $news->descriptionMobTranslate?->{$lang},
                    'image' => $news->image_url,
                    'time' => $news->time,
                    'isForm' => $news->isForm,
                    'banner' => $news->banner_url,
                    'type' => $news->type,
                ];
            }
        
        return [
            'slug' => $this->slug,
            'title' => $this->titleTranslate?->{$lang},
            'description' => $this->descriptionTranslate?->{$lang},
            'description_mob' => $this->descriptionMobTranslate?->{$lang},
            'image' => $image,
            'time' => $this->time,
            'isForm' => $this->isForm,
            'banner' => $this->banner_url,
            'type' => $this->type,
            'models' => $models,
            'connectedNews' => $connectedNews,
        ];
    }
}
