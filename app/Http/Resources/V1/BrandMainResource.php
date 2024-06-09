<?php

namespace App\Http\Resources\V1;

use App\Models\BrandPage;
use App\Models\CarType;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\CarModel;

class BrandMainResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $brandPage = BrandPage::where('brand_id', $this->id)->first();
        $image = $brandPage ? $brandPage->image_url : null;
        //car models in arrays by CarType. model has type_id. type has title. array has title and models
        $types = CarTypeResource::collection(CarType::all())->jsonSerialize();
        //add one more entry to array which is all types, which has title and models of any type

        $types[] = [
            'title' => 'Все модели',
            'id' => 0,
            'models' => CarTypeModelResource::collection(CarModel::where('is_active', 1)->get())->jsonSerialize(),
        ];

        
        return [
            'logo' => $this->logo_url,
            'title' => $this->title,
            'image' => $image,
            'types' => $types,
        ];
    }
}
