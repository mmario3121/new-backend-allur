<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\BrandPage;
use App\Models\CarType;
use App\Models\CarModel;

class BrandTypeResource extends JsonResource
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
                'models' => CarTypeModelLogoResource::collection($models),
            ];
        });
        //add one more entry to array which is all types, which has title and models of any type

        $types[] = [
            'title' => 'Все модели',
            'id' => 0,
            'models' => CarTypeModelLogoResource::collection(CarModel::where('is_active', 1)->where('brand_id', $this->id)->get())->jsonSerialize(),
        ];

        return [
            'logo' => $this->logo_url,
            'title' => $this->title,
            'types' => $types,
        ];
    }
}
