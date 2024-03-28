<?php

namespace App\Http\Resources\V1\Platform;

use Illuminate\Http\Resources\Json\JsonResource;

class AdditionalResource extends JsonResource
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
            'image' => $this->image_url,
            'price' => (int)$this->price,
            'price_2' =>(int) $this->price_2,
            'prices' => $this->prices,
            'description' => $this->descriptionTranslate?->{$language},
//            'type_id' => $this->id,
            'type_id_2' => $this->id,
//            'is_buy' => true,
            'type_name' => 'additional',
        ];
    }
}
