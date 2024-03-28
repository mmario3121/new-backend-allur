<?php

namespace App\Http\Resources\V1\Platform;

use App\Models\CourseAccess;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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

        $courseAccess = CourseAccess::query()
            ->where('user_id', '=', auth()->id())
            ->where('course_id', '=', $this->id)
            ->exists();

        $isBuy = true;
        if ($courseAccess) {
            $isBuy = false;
        }

        return [
            'id' => $this->id,
            'title' => $this->titleTranslate?->{$language},
            'description' => $this->descriptionTranslate?->{$language},
            'image' => $this->image_url,
            'courseImages' => count($this->courseImages) ? CourseImageResource::collection($this->courseImages) : null,
            'price' => $this->price,
            'is_buy' => $isBuy,
            'type_name' => 'course',
//            'type_id' => $this->id,
            'type_id_2' => $this->id,
        ];
    }
}
