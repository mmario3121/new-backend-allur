<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class AchievementResource extends JsonResource
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
            $description = $this->description;
            $description2 = $this->description2;
        }
        else{
            $title = $this->title_kz;
            $description = $this->description_kz;
            $description2 = $this->description2_kz;
        }
        $achievementImages = $this->achievementImages;
        return [
            'title' => $title,
            'description' => $description,
            'description2' => $description2,
            'achievementImages' => AchievementImageResource::collection($achievementImages),
        ];
    }
}
