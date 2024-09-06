<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Brand;
use App\Models\City;
use App\Models\Article;
use App\Models\MainPageBanner;

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
        $news = ArticleResource::collection(Article::orderBy('id', 'desc')->where('isMainPage', 1)->get());
        $cities = CityResource::collection(City::all());
        $banners = MainPageBannerResource::collection(MainPageBanner::all());

        return [
            'video' => $this->video_url,
            'mobile_video' => $this->mobile_video_url,
            'brands' => $brands,
            'finance_title' => $finance_title,
            'finance_photo' => $this->finance_photo_url,
            'news' => $news,
            'production_title' => $production_title,
            'production_description' => $production_description,
            'production_images' => $this->production_image_url,
            'production_subtitle' => $production_subtitle,
            'career_title' => $career_title,
            'career_text' => $career_text,
            'career_photos' => [
                $this->career_photo1_url,
                $this->career_photo2_url,
                $this->career_photo3_url,
            ],
            'cities' => $cities,
            'consultation_photo' => $this->consultation_photo_url,
            'banners' => $banners,
        ];
    }
}
