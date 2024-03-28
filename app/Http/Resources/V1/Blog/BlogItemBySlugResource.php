<?php

namespace App\Http\Resources\V1\Blog;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogItemBySlugResource extends JsonResource
{
    public static $wrap = null;
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
            'description' => $this->descriptionTranslate?->{$language},
            'content' => $this->contentTranslate?->{$language},
            'author' => $this->authorTranslate?->{$language},
            'slug' => $this->slug,
            'main_image' => $this->main_image_url,
            'image_1' => $this->image_1_url,
            'image_2' => $this->image_2_url,
        ];
    }
}
