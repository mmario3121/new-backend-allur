<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class DealerAddressResource extends JsonResource
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
        if($lang == 'kz'){
            $address = $this->address_kz;
            $worktime = $this->worktime_kz;
            $name = $this->dealer->name_kz;
        }else{
            $address = $this->address;
            $worktime = $this->worktime;
            $name = $this->dealer->name;
        }
        //worktime is string with \r\n as separator
        $worktime = explode("\r\n", $worktime);
        //there is two stirngs in worktime, separate it into $worktime and $worktime_weekend
        $worktime_weekend = $worktime[1];
        $worktime_normal = $worktime[0];
        //phone is string with comma as separator
        //also remove spaces
        $phone = str_replace(' ', '', $this->phone);
        $phone = explode(',', $phone);

        //coordinates is string with comma as separator
        $coordinates = explode(',', $this->coordinates);
        //remove spaces
        $coordinates = array_map('trim', $coordinates);
        //make first one y => lat, x => lng
        $coordinates = [
            'x' => $coordinates[0],
            'y' => $coordinates[1],
        ];
        return [
            'address' => $address,
            'worktime' => $worktime_normal,
            'worktime_weekend' => $worktime_weekend,
            'phone' => $phone,
            'city' => $this->dealer->city->titleTranslate->{$lang},
            'name' => $name,
            'coordinates' => $coordinates,
        ];
    }
}
