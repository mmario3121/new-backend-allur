<?php

namespace App\Http\Resources\V1\Price;

use Illuminate\Http\Resources\Json\JsonResource;

class PriceSubscriptionItemResource extends JsonResource
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
            'description' => $this->descriptionTranslate?->{$language},
            'content' => $this->contentTranslate?->{$language},
            'content_description' => $this->contentDescriptionTranslate?->{$language},
            'image' => $this->image_url,
            'link' => $this->link,
        ];
    }
}
