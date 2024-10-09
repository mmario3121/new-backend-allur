<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\BrandPage;
use App\Models\CarType;
use App\Models\CarModel;
use App\Models\Dealer;
use App\Models\DealerAddress;
use App\Models\City;

class BrandResource extends JsonResource
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
        $brandId = $this->id;
        $brandPage = BrandPage::where('brand_id', $this->id)->first();
        
        $types = CarType::all()->map(function ($type) use ($brandId) {
            $models = CarModel::where('type_id', $type->id)
                ->where('brand_id', $brandId)
                ->where('is_active', 1)
                ->get();
    
            return [
                'title' => $type->title,
                'id' => $type->id,
                'models' => CarTypeModelResource::collection($models),
            ];
        });
        //add one more entry to array which is all types, which has title and models of any type

        $types[] = [
            'title' => 'Все модели',
            'id' => 0,
            'models' => CarTypeModelResource::collection(CarModel::where('is_active', 1)->where('brand_id', $this->id)->get())->jsonSerialize(),
        ];

        //Put addresses in respective cities
        $cities = City::whereIn('id', [1, 2])->get();
        $cityArray = [];
        foreach ($cities as $city) {
            $dealers = Dealer::where('city_id', $city->id)->where('brand_id', $this->id)->get();
            $addresses = DealerAddressResource::collection(DealerAddress::whereIn('dealer_id', $dealers->pluck('id')->toArray())->get());
            $cityArray[] = [
                'title' => $city->titleTranslate->{$lang},
                'bitrix_id' => $city->bitrix_id,
                'dealers' => $addresses,
            ];
        }


        return [
            'logo' => $this->logo_url,
            'title' => $this->title,
            'image' => $brandPage ? $brandPage->image_url : null,
            'subTitle' => $brandPage ? $brandPage->title : '',
            'description' => $brandPage ? $brandPage->description : '',
            'types' => $types,
            'cities' => $cityArray,
        ];
    }
}
