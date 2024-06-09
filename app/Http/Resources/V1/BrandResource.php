<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\BrandPage;
use App\Models\CarType;
use App\Models\CarModel;

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
        $brandPage = BrandPage::where('brand_id', $this->id)->first();
        
        $types = CarTypeResource::collection(CarType::where('brand_id', $this->id)->get())->jsonSerialize();
        //add one more entry to array which is all types, which has title and models of any type

        $types[] = [
            'title' => 'Все модели',
            'id' => 0,
            'models' => CarTypeModelResource::collection(CarModel::where('is_active', 1)->where('brand_id', $this->id)->get())->jsonSerialize(),
        ];

        return [
            'logo' => $this->logo_url,
            'title' => $this->title,
            'image' => $brandPage ? $brandPage->image_url : null,
            'subTitle' => $brandPage ? $brandPage->title : '',
            'description' => $brandPage ? $brandPage->description : '',
            'types' => $types,
        ];
    }
}
