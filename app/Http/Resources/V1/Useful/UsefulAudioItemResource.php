<?php

namespace App\Http\Resources\V1\Useful;

use Illuminate\Http\Resources\Json\JsonResource;

class UsefulAudioItemResource extends JsonResource
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
            'audio' => ($this->type == 0) ? $this->audio_url : $this->audio_link
        ];
    }
}
