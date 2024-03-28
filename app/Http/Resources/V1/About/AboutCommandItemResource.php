<?php

namespace App\Http\Resources\V1\About;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutCommandItemResource extends JsonResource
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
            'job' => $this->jobTranslate?->{$language},
            'image' => $this->image_url
        ];
    }
}
