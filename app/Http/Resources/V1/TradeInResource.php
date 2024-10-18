<?php

namespace App\Http\Resources\V1;

use App\Models\CareraBanner;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\ArticleResource;
use App\Models\Article;

class TradeInResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($request->lang == 'ru'){
            $title = $this->title;
            $text = $this->text;
            $image = $this->image_url;
            $form_image = $this->form_image_url;
            $card1 = $this->card1;
            $card2 = $this->card2;
            $card3 = $this->card3;
            $card4 = $this->card4;
            $card5 = $this->card5;
            $card6 = $this->card6;
            $subtitle = $this->subtitle;
            $annotation = $this->annotation;
        }else{
            $title = $this->title_kz;
            $text = $this->text_kz;
            $image = $this->image_url;
            $form_image = $this->form_image_url;
            $card1 = $this->card1_kz;
            $card2 = $this->card2_kz;
            $card3 = $this->card3_kz;
            $card4 = $this->card4_kz;
            $card5 = $this->card5_kz;
            $card6 = $this->card6_kz;
            $subtitle = $this->subtitle_kz;
            $annotation = $this->annotation_kz;    
        }
        
        return [
            'title' => $title,
            'text' => $text,
            'image' => $image,
            'form_image' => $form_image,
            'card1' => $card1,
            'card2' => $card2,
            'card3' => $card3,
            'card4' => $card4,
            'card5' => $card5,
            'card6' => $card6,
            'subtitle' => $subtitle,
            'annotation' => $annotation
        ];
    }
}
