<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ModelComplectationsResource extends JsonResource
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
        if ($lang == 'ru') {
            $specs =  $this->specs->map(function ($spec) use ($lang) {
                return [
                    'type' => $spec->type,
                    'value' => $spec->value,
                ];
            });
        }else{
            $specs =  $this->specs->map(function ($spec) use ($lang) {
                return [
                    'type' => $spec->type,
                    'value' => $spec->value_kz,
                ];
            });
        }
        return [
            'price' => $this->price,
            'title' => $this->title,
            'bitrix_id' => $this->bitrix_id,
            
            'specs' => $specs,
        ];
    }
}
