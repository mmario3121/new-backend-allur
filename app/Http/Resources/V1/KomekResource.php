<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class KomekResource extends JsonResource
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
        if($lang == 'ru') {
            $title = $this->title;
            $text = $this->text;
        } else {
            $title = $this->title_kz;
            $text = $this->text_kz;
        }
        return [
            'id' => $this->id,
            'title' => $title,
            'text' => $text,
            'image' => $this->image_url,
            'form_image' => $this->form_image_url,
            'card1' => $this->card1,
            'card2' => $this->card2,
            'card3' => $this->card3,
            'card4' => $this->card4,
            'card5' => $this->card5,
            'card6' => $this->card6,
            'services' => $this->services
        ];
    }
}
