<?php

namespace App\Http\Resources\V1\Useful;

use Illuminate\Http\Resources\Json\JsonResource;

class UsefulVideoItemResource extends JsonResource
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
            'video' => ($this->type == 0) ? $this->video_url : $this->video_link
        ];
    }
}
