<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanySliderResource extends JsonResource
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
            'id' => $this->id,
            'image_url' => $this->image_url,
            'image_mob_url' => $this->image_mob_url,
            'position' => $this->position,
            'title' => $title,
        ];
    }
}
