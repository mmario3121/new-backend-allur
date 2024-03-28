<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ModelColorsResource extends JsonResource
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
            'image' => $this->image_url,
            'title' => $title,
            'hex' => $this->hex_url,
            'bitrix_id' => $this->bitrix_id,
        ];
    }
}
