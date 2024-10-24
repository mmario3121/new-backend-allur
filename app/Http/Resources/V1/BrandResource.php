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
       
        
        
        $types = CarType::all()->map(function ($type) use ($brandId, $lang) {
            $models = CarModel::where('type_id', $type->id)
                ->where('brand_id', $brandId)
                ->where('is_active', 1)
                ->get();
    
            if ($lang == 'ru'){
                $title = $type->title;
            }else{
                $title = $type->title_kz;
            }

            return [
                'title' => $title,
                'id' => $type->id,
                'models' => CarTypeModelLogoResource::collection($models),
            ];
        });
        //add one more entry to array which is all types, which has title and models of any type

        if ($lang == 'ru'){
            $subTitle = $brandPage ? $brandPage->title : '';
            $description = $brandPage ? $brandPage->description : '';
            $allModels = 'Все модели';
        }else{
            $subTitle = $brandPage ? $brandPage->title_kz : '';
            $description = $brandPage ? $brandPage->description_kz : '';
            $allModels = 'Барлық модельдер';
        }

            
        $types[] = [
            'title' => $allModels,
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
            'subTitle' => $subTitle,
            'description' => $description,
            'types' => $types,
            'cities' => $cityArray,
        ];
    }
}
