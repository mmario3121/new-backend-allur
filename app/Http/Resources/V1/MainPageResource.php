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
            $production_title = $this->production_title_kz;
            $production_description = $this->production_description_kz;
            $map_title = $this->career_title_kz;
            $map_text = $this->career_text_kz;
        } else {
            $production_title = $this->production_title;
            $production_description = $this->production_description;
            $map_title = $this->career_title;
            $map_text = $this->career_text;
        }
        $map_image = $this->career_photo1_url;

        $brands = BrandMainResource::collection(Brand::all());
        $brandsNew = BrandNewMainResource::collection(Brand::all());
        $news = ArticleResource::collection(Article::orderBy('id', 'desc')->where('isMainPage', 1)->get());
        $cities = CityResource::collection(City::all());
        $banners = MainPageBannerResource::collection(MainPageBanner::all());

        return [
            'video' => $this->video_url,
            'mobile_video' => $this->mobile_video_url,
            'brands' => $brands,
            'brandsNew' => $brandsNew,
            'news' => $news,
            'abt_company_title' => $production_title,
            'abt_company_description' => $production_description,
            'abt_company_image' => $this->career_photo1_url,
            'cities' => $cities,
            'banners' => $banners,
            'map'=> [
                'title' => $map_title,
                'text' => $map_text,
                'image' => $map_image
            ]
        ];
    }
}
