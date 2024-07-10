<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ModelColor;
class CarTypeModelLogoResource extends JsonResource
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
        return [
            'slug' => $this->slug,
            'title' => $title,
            'image' => $this->logo_url,
            'price' => $this->min_price(),
        ];
    }
}
