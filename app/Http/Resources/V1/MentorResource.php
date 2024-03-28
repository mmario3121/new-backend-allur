<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class MentorResource extends JsonResource
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
            'image' => $this->image_url,
            'full_name' => $this->fullNameTranslate?->{$language},
            'direction' => $this->directionTranslate?->{$language},
            'experience_work' => $this->experienceWorkTranslate?->{$language},
            'experience_company' => $this->experienceCompanyTranslate?->{$language},
            'industry' => $this->industryTranslate?->{$language},
            'biography' => $this->biographyTranslate?->{$language},
            'reserve_price' => $this->reserve_price,
        ];
    }
}
