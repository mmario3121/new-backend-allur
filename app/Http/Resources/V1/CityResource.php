<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Dealer;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang = $request->lang;
      
        $dealer = Dealer::where('city_id', $this->id)->pluck('bitrix_id')->first();

        return [
            'name' => $this->titleTranslate->{$lang},
            'bitrix_id' => $this->bitrix_id,
            'dealer_id' => $dealer,
        ];
    }
}
