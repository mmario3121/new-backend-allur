<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
class ModelSectionItemResource extends JsonResource
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
        if($lang == 'ru'){
            $title = $this->title;
            $text = $this->text;
        }else{
            $title = $this->title_kz;
            $text = $this->text_kz;
        }
        return [
            'title' => $title,
            'text' => $text,
            'image' => $this->image_url,
        ];
    }
}
