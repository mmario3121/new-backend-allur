<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CarModelResource extends JsonResource
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
            'type' => $this->type->title,
            'slug' => $this->slug,
            'title' => $title,
            'logo' => $this->logo_url,
            'video' => $this->video_url,
            'price_list' => $this->price_list_url,
            'document' => $this->document_url,
            'bitrix_id' => $this->bitrix_id,
        ];
    }
}
