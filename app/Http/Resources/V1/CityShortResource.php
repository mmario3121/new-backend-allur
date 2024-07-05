<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Dealer;
use App\Models\DealerAddress;

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
      
        $dealers = DealerResource::collection(Dealer::where('city_id', $this->id)->get());
        //we have DealerAddress model, need an array with addresses

        // $addresses = DealerAddressResource::collection(DealerAddress::whereIn('dealer_id', $dealers)->get());

        return [
            'name' => $this->titleTranslate->{$lang},
            'bitrix_id' => $this->bitrix_id,
            'dealers' => $dealers,
        ];
    }
}
