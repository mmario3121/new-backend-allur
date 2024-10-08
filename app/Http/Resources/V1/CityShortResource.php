<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Dealer;
use App\Models\DealerAddress;

class CityShortResource extends JsonResource
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
        $code = "";
        if ($this->id == 1){
            $code = "al";
        }elseif ($this->id == 2){
            $code = "as";
        }
        return [
            'id' => $this->id,
            'name' => $this->titleTranslate->{$lang},
            'bitrix_id' => $this->bitrix_id,
            'dealers' => $dealers,
            'code' => $code,
        ];
    }
}
