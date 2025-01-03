<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class SlidersResource extends JsonResource
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
            return [
                'image' => $this->image_kz_url,
                'image_mob' => $this->image_mob_kz_url,
                'link' => $this->link,
                'title' => $this->title_kz,
                'icon' => $this->icon_url,
            ];
        }
        return [
            'image' => $this->image_url,
            'image_mob' => $this->image_mob_url,
            'link' => $this->link,
            'title' => $this->title,
            'icon' => $this->icon_url,
        ];
    }
}
