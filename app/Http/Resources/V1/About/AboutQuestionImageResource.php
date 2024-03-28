<?php

namespace App\Http\Resources\V1\About;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutQuestionImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'image' => $this->image_url
        ];
    }
}
