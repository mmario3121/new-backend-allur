<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\CarModel;
class CarTypeResource extends JsonResource
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
        $models = CarModel::where('type_id', $this->id)
        ->where('is_active', 1)
        ->get();
        return [
            'title' => $this->title,
            'id' => $this->id,
            'models' => CarTypeModelResource::collection($models),
        ];
    }
}
