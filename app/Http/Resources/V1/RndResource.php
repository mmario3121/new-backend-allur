<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\RndAchievementResource;
use App\Models\RndAchievement;
use Illuminate\Http\Resources\Json\JsonResource;

class RndResource extends JsonResource
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

        }
        else{
        }
        return [
            'section1' => $this->section1,
            'section2' => $this->section2,
            'section3_image' => $this->section3_image_url,
            'section3_banner' => $this->section3_banner_url,
            'section3_text' => $this->section3_text,
            'rndAchievements' => RndAchievementResource::collection(RndAchievement::orderBy('position', 'asc')->get()),
        ];
    }
}
