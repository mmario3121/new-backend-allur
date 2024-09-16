<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\MainPageBanner;

class ShortModelResource extends JsonResource
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
            $title = $this->title_kz;
        }else{
            $title = $this->title;
        }
        $main_page_banner = new MainPageBannerResource(MainPageBanner::where('model_id', $this->id)->first());
        return [
            'id' => $this->id,
            'title' => $title,
            'logo' => $this->logo_url,
            'bitrix_id' => $this->bitrix_id,
            'slug' => $this->slug,
            'price' =>$this->min_price(),
            'main_page_banner' => $main_page_banner,
            'main_image'=> $this->main_page_image_url,
        ];
    }
}
