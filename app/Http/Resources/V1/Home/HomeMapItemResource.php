<?php

namespace App\Http\Resources\V1\Home;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeMapItemResource extends JsonResource
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
            'latitude' => $this->x_point,
            'longitude' => $this->y_point,
            'name' => $this->nameTranslate?->{$language},
            'pop_max' => $this->pop_max,
        ];
    }
}
