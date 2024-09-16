<?php

namespace App\Http\Resources\V1;

use App\Models\BrandPage;
use App\Models\CarType;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\CarModel;

class BrandNewMainResource extends JsonResource
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

        $models = CarModel::where('brand_id', $this->id)
                         ->where('is_active', 1)
                         ->get();
        return [
            'logo' => $this->logo_url,
            'title' => $this->title,
            'image' => $image,
            'models' => ShortModelResource::collection($models),
        ];
    }
}
