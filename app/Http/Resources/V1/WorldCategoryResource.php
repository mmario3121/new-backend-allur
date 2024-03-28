<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class WorldCategoryResource extends JsonResource
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
        if($lang == 'ru'){
            $title = $this->title;
        }
        else{
            $title = $this->title_kz;
        }
        return [
            'image' => $this->image_url,
            'cover_photo' => $this->cover_photo_url,
            'image_mob' => $this->image_mob_url,
            'title' => $title,
            'slug' => $this->slug,
        ];
    }
}
