<?php

namespace App\Http\Resources\V1;

use App\Models\UniversityProgramFavourite;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchUniversityProgramResource extends JsonResource
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

        if (!auth()->check()) {
            $status = $this->id == 1;
        } else {
            $status = auth()->user()->subscriptionAccess ? 1 : ($this->id == 1);
        }

//        $universityProgramFavourite = UniversityProgramFavourite::query()
//            ->where('user_id', '=', auth()->id())
//            ->where('university_program_id', '=', $this->id)
//            ->exists();

        return [
            'id' => $this->id,
            'programName' => $this->program_name ? $this->programNameTranslate?->{$language} : $this->program?->titleTranslate?->{$language},
            'university' => $this->university?->titleTranslate?->{$language},
            'country' => $this->university?->country?->titleTranslate?->{$language},
            'city' => $this->university?->city?->titleTranslate?->{$language},
            'image' => $this->image_url ?? $this->default_image_url,
            'status' => $status,
//            'is_favourite' => $universityProgramFavourite ? 1 : 0,
        ];
    }
}
