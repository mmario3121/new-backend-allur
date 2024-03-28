<?php

namespace App\Http\Resources\V1\Useful;

use Illuminate\Http\Resources\Json\JsonResource;

class HowItWorksItemResource extends JsonResource
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
            'image_mobile' => $this->image_mobile_url,
        ];
    }
}
