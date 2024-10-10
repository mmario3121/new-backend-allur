<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\ArticleResource;
use App\Models\Article;

class FinancePageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // protected $appends = ['image_url', 'block2_image_url'];
        // protected $fillable = ['title', 'image', 'text', 'card1_title', 'card1_text', 'card2_title', 'card2_text', 'card3_title', 'card3_text', 'card4_title', 'card4_text', 'card5_title', 'card5_text', 'card5_subtitle', 'card6_title', 'card6_text', 'card6_subtitle', 'card7_title', 'card7_text', 'card7_subtitle', 'card8_title', 'card8_text', 'card8_subtitle', 'card9_title', 'card9_text', 'card9_subtitle', 'block2_image', 'mini_card_5', 'mini_card_6', 'mini_card_7', 'mini_card_8', 'mini_card_9'];
            $title = $this->title;
            $text = $this->text;
            $card1_title = $this->card1_title;
            $card1_text = $this->card1_text;
            $card2_title = $this->card2_title;
            $card2_text = $this->card2_text;
            $card3_title = $this->card3_title;
            $card3_text = $this->card3_text;
            $card4_title = $this->card4_title;
            $card4_text = $this->card4_text;
            $card5_title = $this->card5_title;
            $card5_text = $this->card5_text;
            //mini_card_5 is a json
            $mini_card_5 = json_decode($this->mini_card_5);
            $card5_subtitle = $this->card5_subtitle;
            $card6_title = $this->card6_title;
            $card6_text = $this->card6_text;
            $card6_subtitle = $this->card6_subtitle;
            $mini_card_6 = json_decode($this->mini_card_6);
            $card7_title = $this->card7_title;
            $card7_text = $this->card7_text;
            $card7_subtitle = $this->card7_subtitle;
            $mini_card_7 = json_decode($this->mini_card_7);
            $card8_title = $this->card8_title;
            $card8_text = $this->card8_text;
            $card8_subtitle = $this->card8_subtitle;
            $mini_card_8 = json_decode($this->mini_card_8);
            $card9_title = $this->card9_title;
            $card9_text = $this->card9_text;
            $card9_subtitle = $this->card9_subtitle;
            $mini_card_9 = json_decode($this->mini_card_9);
            $block2_image = $this->block2_image_url;

            $news = ArticleResource::collection(Article::where('isFinance', 1)->get());
        
        return [
            'title' => $title,
            'text' => $text,
            'card1_title' => $card1_title,
            'card1_text' => $card1_text,
            'card2_title' => $card2_title,
            'card2_text' => $card2_text,
            'card3_title' => $card3_title,
            'card3_text' => $card3_text,
            'card4_title' => $card4_title,
            'card4_text' => $card4_text,
            'card5_title' => $card5_title,
            'card5_text' => $card5_text,
            'mini_card_5' => $mini_card_5,
            'card5_subtitle' => $card5_subtitle,
            'card6_title' => $card6_title,
            'card6_text' => $card6_text,
            'card6_subtitle' => $card6_subtitle,
            'mini_card_6' => $mini_card_6,
            'card7_title' => $card7_title,
            'card7_text' => $card7_text,
            'card7_subtitle' => $card7_subtitle,
            'mini_card_7' => $mini_card_7,
            'card8_title' => $card8_title,
            'card8_text' => $card8_text,
            'card8_subtitle' => $card8_subtitle,
            'mini_card_8' => $mini_card_8,
            'card9_title' => $card9_title,
            'card9_text' => $card9_text,
            'card9_subtitle' => $card9_subtitle,
            'mini_card_9' => $mini_card_9,
            'block2_image' => $block2_image,
            'news' => $news
        ];
    }
}
