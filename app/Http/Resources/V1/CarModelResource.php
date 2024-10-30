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
            if ($this->price_list_kz == null) {
                $price_list = $this->price_list_url;
            }else{
                $price_list = $this->price_list_kz_url;
            }
            $document = $this->document_kz; 
            $char1_title = $this->char1_title_kz;
            $char1_value = $this->char1_value_kz;
            $char2_title = $this->char2_title_kz;
            $char2_value = $this->char2_value_kz;
            $char3_title = $this->char3_title_kz;
            $char3_value = $this->char3_value_kz;
            $char4_title = $this->char4_title_kz;
            $char4_value = $this->char4_value_kz;

        }else{
            $title = $this->title;
            $price_list = $this->price_list_url;
            $document = $this->document;
            $char1_title = $this->char1_title;
            $char1_value = $this->char1_value;
            $char2_title = $this->char2_title;
            $char2_value = $this->char2_value;
            $char3_title = $this->char3_title;
            $char3_value = $this->char3_value;
            $char4_title = $this->char4_title;
            $char4_value = $this->char4_value;
        }
        return [
            'type' => $this->type->title,
            'slug' => $this->slug,
            'title' => $title,
            'logo' => $this->logo_url,
            'video' => $this->video_url,
            'price_list' => $price_list,
            'document' => $document,
            'bitrix_id' => $this->bitrix_id,
            'char1_title' => $char1_title,
            'char1_value' => $char1_value,
            'char2_title' => $char2_title,
            'char2_value' => $char2_value,
            'char3_title' => $char3_title,
            'char3_value' => $char3_value,
            'char4_title' => $char4_title,
            'char4_value' => $char4_value,
        ];
    }
}
