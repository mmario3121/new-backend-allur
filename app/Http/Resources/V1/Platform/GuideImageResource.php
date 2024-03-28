<?php

namespace App\Http\Resources\V1\Platform;

use App\Models\GuideAccess;
use Illuminate\Http\Resources\Json\JsonResource;

class GuideImageResource extends JsonResource
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
            'id' => $this->id,
            'image' => $this->image_url,
        ];
    }
}
