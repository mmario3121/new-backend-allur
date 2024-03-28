<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ModelColor;
class CarTypeModelResource extends JsonResource
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
            $title = $this->title_kz;
        }else{
            $title = $this->title;
        }
        $colors = ModelColor::where('model_id', $this->id)->get();
        return [
            'type' => $this->type->title,
            'slug' => $this->slug,
            'title' => $title,
            'logo' => $this->logo_url,
            'bitrix_id' => $this->bitrix_id,
            'colors' => ModelColorsResource::collection($colors),
        ];
    }
}
