<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CareraBannerResource extends JsonResource
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
            return [
                'image' => $this->image_kz_url,
                'title' => $this->title_kz,
                'text' => $this->text_kz,
            ];
        }
        return [
            'image' => $this->image_url,
            'title' => $this->title,
            'text' => $this->text,
        ];
    }
}
