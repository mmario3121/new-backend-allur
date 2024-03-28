<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
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
            $description = $this->description;
        }
        else{
            $title = $this->title_kz;
            $description = $this->description_kz;
        }
            $data = [
                'id' => $this->id,
                'title' => $title,
                'description' => $description,
                'image' => $this->image_url,
            ];
            return $data;
    }
}
