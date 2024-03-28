<?php

namespace App\Http\Resources\V1\Development;

use Illuminate\Http\Resources\Json\JsonResource;

class DevelopmentPodcastItemResource extends JsonResource
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
            'image' => $this->image_url,
            'type' => $this->type,
            'src_value' => $this->src_value
        ];
    }
}
