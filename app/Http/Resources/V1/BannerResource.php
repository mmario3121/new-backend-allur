<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($request->lang == 'ru'){
            $title = $this->title;
            $image = $this->image_url;
        }else{
            $title = $this->title_kz;
            $image = $this->image_kz_url;
        }
        return [
            'id' => $this->id,
            'title' => $title,
            'image' => $image,
            'slug' => $this->slug,
        ];
    }
}
