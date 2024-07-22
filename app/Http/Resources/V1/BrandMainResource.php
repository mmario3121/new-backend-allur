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

        $types = CarType::all()->map(function ($type) {
            $models = CarModel::where('type_id', $type->id)
                               ->where('brand_id', $this->id)
                               ->where('is_active', 1)
                               ->get();
            return [
                'title' => $type->title,
                'id' => $type->id,
                'models' => CarTypeModelResource::collection($models),
            ];
        });
    
        $allModels = CarModel::where('brand_id', $this->id)
                             ->where('is_active', 1)
                             ->get();
        $types->push([
            'title' => 'Все модели',
            'id' => 0,
            'models' => CarTypeModelResource::collection($allModels),
        ]);
    
        return [
            'logo' => $this->logo_url,
            'title' => $this->title,
            'image' => $image,
            'types' => $types,
        ];
    }
}
