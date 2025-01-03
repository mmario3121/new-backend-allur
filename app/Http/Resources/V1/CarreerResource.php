<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\ArticleResource;
use App\Models\Article;
use App\Models\SEO;

class CarreerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
    //     protected $appends = ['block1_image_url', 'block2_image_url', 'block3_image_url', 'block4_image_url', 'block5_image_url', 'block6_image_url', 'block7_image_url', 'block8_image_url', 'block9_image_url', 'block10_image_url'];
    // protected $fillable = ['block1_title', 'block1_text', 'block1_image', 'block2_title', 'block2_text', 'block2_image', 'block3_title', 'block3_text', 'block3_image', 'block4_title', 'block4_text', 'block4_image', 'block5_title', 'block5_text', 'block5_image', 'block6_title', 'block6_text', 'block6_image', 'block7_title', 'block7_text', 'block7_image', 'block8_title', 'block8_text', 'block8_image', 'block9_title', 'block9_text', 'block9_image', 'block10_title', 'block10_text', 'block10_image', 'card1_title', 'card1_text', 'card2_title', 'card2_text', 'card3_title', 'card3_text', 'card4_title', 'card4_text'];
            $block1_title = $this->block1_title;
            $block1_text = $this->block1_text;
            $block1_image = $this->block1_image_url;
            $block2_title = $this->block2_title;
            $block2_text = $this->block2_text;
            $block2_image = $this->block2_image_url;
            $block3_title = $this->block3_title;
            $block3_text = $this->block3_text;
            $block3_image = $this->block3_image_url;
            $block4_title = $this->block4_title;
            $block4_text = $this->block4_text;
            $block4_image = $this->block4_image_url;
            $block5_title = $this->block5_title;
            $block5_text = $this->block5_text;
            $block5_image = $this->block5_image_url;
            $block6_title = $this->block6_title;
            $block6_text = $this->block6_text;
            $block6_image = $this->block6_image_url;
            $block7_title = $this->block7_title;
            $block7_text = $this->block7_text;
            $block7_image = $this->block7_image_url;
            $block8_title = $this->block8_title;
            $block8_text = $this->block8_text;
            $block8_image = $this->block8_image_url;
            $block9_title = $this->block9_title;
            $block9_text = $this->block9_text;
            $block9_image = $this->block9_image_url;
            $block10_title = $this->block10_title;
            $block10_text = $this->block10_text;
            $block10_image = $this->block10_image_url;
            $block11_title = $this->block11_title;
            $block11_text = $this->block11_text;
            $block11_image = $this->block11_image_url;
            $card1_title = $this->card1_title;
            $card1_text = $this->card1_text;
            $card2_title = $this->card2_title;
            $card2_text = $this->card2_text;
            $card3_title = $this->card3_title;
            $card3_text = $this->card3_text;
            $card4_title = $this->card4_title;
            $card4_text = $this->card4_text;
        
        $news = ArticleResource::collection(Article::where('isProduction', 1)->take(10)->get());
        return [
            'production' => [
                [
                    'title' => $block1_title,
                    'text' => $block1_text,
                    'image' => $block1_image,
                ],
                [
                    'title' => $block2_title,
                    'text' => $block2_text,
                    'image' => $block2_image,
                ],
            ],
            'slider_title' => $block3_title,
            'slider' =>[
                [
                    'title' => $block3_title,
                    'text' => $block3_text,
                    'image' => $block3_image,
                ],
                [
                    'title' => $block4_title,
                    'text' => $block4_text,
                    'image' => $block4_image,
                ],
                [
                    'title' => $block5_title,
                    'text' => $block5_text,
                    'image' => $block5_image,
                ],
                [
                    'title' => $block6_title,
                    'text' => $block6_text,
                    'image' => $block6_image,
                ],
                [
                    'title' => $block7_title,
                    'text' => $block7_text,
                    'image' => $block7_image,
                ],
                [
                    'title' => $block8_title,
                    'text' => $block8_text,
                    'image' => $block8_image,
                ],
                [
                    'title' => $block9_title,
                    'text' => $block9_text,
                    'image' => $block9_image,
                ],
            ],
            'factory' =>                
            [
                'title' => $block10_title,
                'text' => $block10_text,
                'image' => $block10_image,
                'cards' => [
                    [
                        'title' => $card1_title,
                        'text' => $card1_text,
                    ],
                    [
                        'title' => $card2_title,
                        'text' => $card2_text,
                    ],
                    [
                        'title' => $card3_title,
                        'text' => $card3_text,
                    ],
                    [
                        'title' => $card4_title,
                        'text' => $card4_text,
                    ],
                ],
            ],
            'block' => [
                'title' => $block10_title,
                'text' => $block10_text,
                'image' => $block10_image,
            ],
            'block2' => [
                'title' => $block11_title,
                'text' => $block11_text,
                'image' => $block11_image,
            ],
          'news' => $news,
          'meta' => new SEOResource(SEO::where('page', 'production')->first())
        ];
    }
}
