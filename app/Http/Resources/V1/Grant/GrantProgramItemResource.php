<?php

namespace App\Http\Resources\V1\Grant;

use App\Http\Resources\V1\Price\PriceSubscriptionItemResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GrantProgramItemResource extends JsonResource
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
            'subtitle' => $this->subtitleTranslate?->{$language},
            'title_description' => $this->titleDescriptionTranslate?->{$language},
            'description' => $this->descriptionTranslate?->{$language},
            'image' => $this->image_url,
            'price' => $this->price,
            'is_present' => $this->is_present,
            'images' => GrantProgramItemImageResource::collection($this->grantProgramItemImages),
            'subscriptionItem' => $this->subscriptionItem ? new PriceSubscriptionItemResource($this->subscriptionItem) : null,
            'material' => $this->grantProgramItemMaterial ? new GrantProgramItemMaterialResource($this->grantProgramItemMaterial) : null
        ];
    }
}
