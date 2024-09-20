<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class MainPageBannerResource extends JsonResource
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
            $description = $this->description;
        }else{
            $title = $this->title_kz;
            $description = $this->description_kz;
        }
        return [
            'id' => $this->id,
            'title' => $title,
            'description' => $description,
            'image' => $this->image_url,
            'mobile_image' => $this->mobile_image_url,
            'link' => $this->link,
            'model_id' => $this->model_id,
        ];
    }
}
