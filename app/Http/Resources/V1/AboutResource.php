<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\ArticleResource;
use App\Models\Article;

class AboutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
    //     protected $appends = ['block1_image_url', 'block2_image_url', 'block3_image_url', 'block4_image_url', 'block5_image_url', 'block6_image_url'];  
    //     protected $fillable = ['block1_title', 'block1_text', 'block1_image', 'block2_title', 'block2_text', 'block2_image', 'block3_title', 'block3_text', 'block3_image', 'block3_card1', 'block3_card2', 'block4_title', 'block4_text', 'block4_image', 'block5_title', 'block5_text', 'block5_image', 'block6_title', 'block6_text', 'block6_image',
    //     'block1_title_kz', 'block1_text_kz', 'block2_title_kz', 'block2_text_kz', 'block3_title_kz', 'block3_text_kz',
    //     'block3_card1_kz', 'block3_card1_text', 'block3_card1_text_kz',
    //     'block3_card2_kz', 'block3_card2_text', 'block3_card2_text_kz',
    //     'block4_title_kz', 'block4_text_kz', 'block5_title_kz', 'block5_text_kz', 'block6_title_kz', 'block6_text_kz'
    // ];
    
        if($request->lang == 'ru'){
            $block1_title = $this->block1_title;
            $block1_text = $this->block1_text;
            $block1_image = $this->block1_image_url;
            $block2_title = $this->block2_title;
            $block2_text = $this->block2_text;
            $block2_image = $this->block2_image_url;
            $block3_title = $this->block3_title;
            $block3_text = $this->block3_text;
            $block3_image = $this->block3_image_url;
            $block3_card1 = $this->block3_card1;
            $block3_card2 = $this->block3_card2;
            $block4_title = $this->block4_title;
            $block4_text = $this->block4_text;
            $block4_image = $this->block4_image_url;
            $block5_title = $this->block5_title;
            $block5_text = $this->block5_text;
            $block5_image = $this->block5_image_url;
            $block6_title = $this->block6_title;
            $block6_text = $this->block6_text;
            $block6_image = $this->block6_image_url;
        }else{
            $block1_title = $this->block1_title_kz;
            $block1_text = $this->block1_text_kz;
            $block2_title = $this->block2_title_kz;
            $block2_text = $this->block2_text_kz;
            $block3_title = $this->block3_title_kz;
            $block3_text = $this->block3_text_kz;
            $block3_card1 = $this->block3_card1_kz;
            $block3_card1_text = $this->block3_card1_text_kz;
            $block3_card2 = $this->block3_card2_kz;
            $block3_card2_text = $this->block3_card2_text_kz;
            $block4_title = $this->block4_title_kz;
            $block4_text = $this->block4_text_kz;
            $block5_title = $this->block5_title_kz;
            $block5_text = $this->block5_text_kz;
            $block6_title = $this->block6_title_kz;
            $block6_text = $this->block6_text_kz;
        }
        
        return [
            'blocks' => [
                [
                    'title' => $block1_title,
                    'text' => $block1_text,
                    'image' => $block1_image
                ],
                [
                    'title' => $block2_title,
                    'text' => $block2_text,
                    'image' => $block2_image
                ],
                [
                    'title' => $block3_title,
                    'text' => $block3_text,
                    'image' => $block3_image,
                    'card1' => $block3_card1,
                    'card1_text' => $block3_card1_text,
                    'card2' => $block3_card2,
                    'card2_text' => $block3_card2_text
                ],
                [
                    'title' => $block4_title,
                    'text' => $block4_text,
                    'image' => $block4_image
                ],
                [
                    'title' => $block5_title,
                    'text' => $block5_text,
                    'image' => $block5_image
                ],
                [
                    'title' => $block6_title,
                    'text' => $block6_text,
                    'image' => $block6_image
                ]
            ]
        ];
    }
}
