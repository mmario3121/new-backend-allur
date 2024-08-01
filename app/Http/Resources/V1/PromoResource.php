<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\ArticleResource;
use App\Models\Article;

class PromoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // protected $fillable = [
        //     'title',
        //     'description',
        //     'image',
        //     'link',
        //     'title_kz',
        //     'description_kz',
        //     'title2',
        //     'description2',
        //     'image2',
        //     'title2_kz',
        //     'description2_kz',
        //     'has_form'
        // ];
        if($request->lang == 'ru'){
            $title = $this->title;
            $description = $this->description;
            $image = $this->image_url;
            $link = $this->link;
            $title2 = $this->title2;
            $description2 = $this->description2;
            $image2 = $this->image2_url;
            $has_form = $this->has_form;
        }else{
            $title = $this->title_kz;
            $description = $this->description_kz;
            $image = $this->image_url;
            $link = $this->link;
            $title2 = $this->title2_kz;
            $description2 = $this->description2_kz;
            $image2 = $this->image2_url;
            $has_form = $this->has_form;
        }
        
        return [
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'link' => $link,
            'title2' => $title2,
            'description2' => $description2,
            'image2' => $image2,
            'has_form' => $has_form
        ];
    }
}
