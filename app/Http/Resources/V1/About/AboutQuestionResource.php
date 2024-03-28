<?php

namespace App\Http\Resources\V1\About;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutQuestionResource extends JsonResource
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
            'aboutQuestionContacts' => AboutQuestionContactResource::collection($this->aboutQuestionContacts->whereIn('type', [0, 1])),
            'aboutQuestionLinks' => AboutQuestionLinkResource::collection($this->aboutQuestionContacts->where('type', 2)),
            'aboutQuestionImages' => AboutQuestionImageResource::collection($this->aboutQuestionImages)
        ];
    }
}
