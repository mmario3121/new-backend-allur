<?php

namespace App\Http\Resources\V1\Home;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeProgramItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $language = app()->getLocale();
        return [
            'id' => $this->id,
            'title' => $this->titleTranslate?->{$language},
            'mini_description' => miniText($this->descriptionTranslate?->{$language}, 150),
            'image' => $this->image_url,
        ];
    }
}
