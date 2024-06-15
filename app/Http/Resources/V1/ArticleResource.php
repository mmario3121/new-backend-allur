<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

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
        ];
    }
}
