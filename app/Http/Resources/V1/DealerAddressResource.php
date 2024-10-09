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
            $address2 = $this->address2_kz;
            $worktime = $this->worktime_kz;
            $name = $this->dealer->name_kz;
        }else{
            $address = $this->address;
            $address2 = $this->address2;
            $worktime = $this->worktime;
            $name = $this->dealer->name;
        }
        if (is_string($worktime)) {
            $worktime = explode("\r\n", $worktime);
            $worktime_weekend = isset($worktime[1]) ? $worktime[1] : null;
            $worktime_normal = isset($worktime[0]) ? $worktime[0] : null;
        } else {
            // Handle the case where $worktime is not a string
            $worktime_weekend = null;
            $worktime_normal = null;
        }
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

        $coordinates2 = explode(',', $this->coordinates2);
        //remove spaces
        $coordinates2 = array_map('trim', $coordinates2);
        //make first one y => lat, x => lng
        if (count($coordinates2) == 2) {
            $coordinates2 = [
                'x' => $coordinates2[0],
                'y' => $coordinates2[1],
            ];
        }else{
            $coordinates2 = null;
        }
        
        if(isset($this->dealer->brand)){
            $logo = $this->dealer->brand->logo_url;
        }
        else{
            $logo = null;
        }

        $adresses[] = [
            'label'=> $address,
            'coordinates' => $coordinates,
        ];
        if($address2){
            $adresses[] = [
                'label'=> $address2,
                'coordinates' => $coordinates2,
            ];
        }
        return [
            'addresses' => $adresses,
            'worktime' => $worktime_normal,
            'worktime_weekend' => $worktime_weekend,
            'phone' => $phone,
            'city' => $this->dealer->city->titleTranslate->{$lang},
            'name' => $name,
            'icon' => $logo
        ];
    }
}
