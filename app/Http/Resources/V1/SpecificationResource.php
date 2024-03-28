<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class SpecificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang = $request->lang;
        if($lang == 'ru'){
            $title = $this->title;
            $value = $this->value;
        }else{
            $title = $this->title_kz;
            $value = $this->value_kz;
        }
        return [
            'id' => $this->id,
            'title' => $title,
            'value' => $value,
            'complectation' => $this->complectation->title
        ];
    }
}
