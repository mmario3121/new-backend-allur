<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Brand;
use App\Models\City;
use App\Models\Article;

class MainPageResource extends JsonResource
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
        if($lang == 'kz'){
            $finance_title = $this->finance_title_kz;
            $career_title = $this->career_title_kz;
            $career_text = $this->career_text_kz;
            $production_title = $this->production_title_kz;
            $production_description = $this->production_description_kz;
            $production_subtitle = $this->production_subtitle_kz;
        } else {
            $finance_title = $this->finance_title;
            $career_title = $this->career_title;
            $career_text = $this->career_text;
            $production_title = $this->production_title;
            $production_description = $this->production_description;
            $production_subtitle = $this->production_subtitle;
        }

        $brands = BrandMainResource::collection(Brand::all());
        $news = ArticleResource::collection(Article::orderBy('id', 'desc')->limit(3)->get());
        $cities = CityResource::collection(City::all());

        return [
            'video' => $this->video_url,
            'mobile_video' => $this->mobile_video_url,
            'brands' => $brands,
            'finance_title' => $finance_title,
            'finance_photo' => $this->finance_photo_url,
            'news' => $news,
            'production_title' => $production_title,
            'production_description' => $production_description,
            'production_image' => $this->production_image_url,
            'production_subtitle' => $production_subtitle,
            'career_title' => $career_title,
            'career_text' => $career_text,
            'career_photo1' => $this->career_photo1_url,
            'career_photo2' => $this->career_photo2_url,
            'career_photo3' => $this->career_photo3_url,
            'cities' => $cities,
            'consultation_photo' => $this->consultation_photo_url,
        ];
    }
}
