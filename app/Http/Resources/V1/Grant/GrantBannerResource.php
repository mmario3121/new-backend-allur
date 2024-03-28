<?php

namespace App\Http\Resources\V1\Grant;

use Illuminate\Http\Resources\Json\JsonResource;

class GrantBannerResource extends JsonResource
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
            'title' => $this->titleTranslate?->{$language},
            'description' => $this->descriptionTranslate?->{$language},
            'image' => $this->image_url,
            'video' => $this->video,
        ];
    }
}
