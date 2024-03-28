<?php

namespace App\Http\Resources\V1\Question;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionItemResource extends JsonResource
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
        ];
    }
}
