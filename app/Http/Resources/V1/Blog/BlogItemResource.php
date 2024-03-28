<?php

namespace App\Http\Resources\V1\Blog;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogItemResource extends JsonResource
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
            'subtitle' => $this->subtitleTranslate?->{$language},
            'description' => miniText($this->descriptionTranslate?->{$language}),
            'main_image' => $this->main_image_url,
            'slug' => $this->slug
        ];
    }
}
