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
        if($request->lang == 'ru'){
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
            $mini_card_5_array = json_decode($this->mini_card_5);
            $mini_card_5['subtitle'] = $mini_card_5_array->subtitle;
            $mini_card_5['annotation'] = $mini_card_5_array->annotation;
            $mini_card_5['field1'] = $mini_card_5_array->field1;
            $mini_card_5['field2'] = $mini_card_5_array->field2;
            $mini_card_5['field3'] = $mini_card_5_array->field3;
            $mini_card_5['field4'] = $mini_card_5_array->field4;
            $card5_subtitle = $this->card5_subtitle;
            $card6_title = $this->card6_title;
            $card6_text = $this->card6_text;
            $card6_subtitle = $this->card6_subtitle;
            $mini_card_6_array = json_decode($this->mini_card_6);
            $mini_card_6['subtitle'] = $mini_card_6_array->subtitle;
            $mini_card_6['annotation'] = $mini_card_6_array->annotation;
            $mini_card_6['field1'] = $mini_card_6_array->field1;
            $mini_card_6['field2'] = $mini_card_6_array->field2;
            $mini_card_6['field3'] = $mini_card_6_array->field3;
            $mini_card_6['field4'] = $mini_card_6_array->field4;
            $card7_title = $this->card7_title;
            $card7_text = $this->card7_text;
            $card7_subtitle = $this->card7_subtitle;
            $mini_card_7_array = json_decode($this->mini_card_7);
            $mini_card_7['subtitle'] = $mini_card_7_array->subtitle;
            $mini_card_7['annotation'] = $mini_card_7_array->annotation;
            $mini_card_7['field1'] = $mini_card_7_array->field1;
            $mini_card_7['field2'] = $mini_card_7_array->field2;
            $mini_card_7['field3'] = $mini_card_7_array->field3;
            $mini_card_7['field4'] = $mini_card_7_array->field4;
            $card8_title = $this->card8_title;
            $card8_text = $this->card8_text;
            $card8_subtitle = $this->card8_subtitle;
            $mini_card_8_array = json_decode($this->mini_card_8);
            $mini_card_8['subtitle'] = $mini_card_8_array->subtitle;
            $mini_card_8['annotation'] = $mini_card_8_array->annotation;
            $mini_card_8['field1'] = $mini_card_8_array->field1;
            $mini_card_8['field2'] = $mini_card_8_array->field2;
            $mini_card_8['field3'] = $mini_card_8_array->field3;
            $mini_card_8['field4'] = $mini_card_8_array->field4;
            $card9_title = $this->card9_title;
            $card9_text = $this->card9_text;
            $card9_subtitle = $this->card9_subtitle;
            $mini_card_9_array = json_decode($this->mini_card_9);
            $mini_card_9['subtitle'] = $mini_card_9_array->subtitle;
            $mini_card_9['annotation'] = $mini_card_9_array->annotation;
            $mini_card_9['field1'] = $mini_card_9_array->field1;
            $mini_card_9['field2'] = $mini_card_9_array->field2;
            $mini_card_9['field3'] = $mini_card_9_array->field3;
            $mini_card_9['field4'] = $mini_card_9_array->field4;
            $block2_image = $this->block2_image_url;
        } else {
            $title = $this->title_kz;
            $text = $this->text_kz;
            $card1_title = $this->card1_title_kz;
            $card1_text = $this->card1_text_kz;
            $card2_title = $this->card2_title_kz;
            $card2_text = $this->card2_text_kz;
            $card3_title = $this->card3_title_kz;
            $card3_text = $this->card3_text_kz;
            $card4_title = $this->card4_title_kz;
            $card4_text = $this->card4_text_kz;
            $card5_title = $this->card5_title_kz;
            $card5_text = $this->card5_text_kz;
            //mini_card_5 is a json
            $mini_card_5_array = json_decode($this->mini_card_5);
            $mini_card_5['subtitle'] = $mini_card_5_array->subtitle_kz;
            $mini_card_5['annotation'] = $mini_card_5_array->annotation_kz;
            $mini_card_5['field1'] = $mini_card_5_array->field1_kz;
            $mini_card_5['field2'] = $mini_card_5_array->field2_kz;
            $mini_card_5['field3'] = $mini_card_5_array->field3_kz;
            $mini_card_5['field4'] = $mini_card_5_array->field4_kz;
            $card5_subtitle = $this->card5_subtitle_kz;
            $card6_title = $this->card6_title_kz;
            $card6_text = $this->card6_text_kz;
            $card6_subtitle = $this->card6_subtitle_kz;
            $mini_card_6_array = json_decode($this->mini_card_6);
            $mini_card_6['subtitle'] = $mini_card_6_array->subtitle_kz;
            $mini_card_6['annotation'] = $mini_card_6_array->annotation_kz;
            $mini_card_6['field1'] = $mini_card_6_array->field1_kz;
            $mini_card_6['field2'] = $mini_card_6_array->field2_kz;
            $mini_card_6['field3'] = $mini_card_6_array->field3_kz;
            $mini_card_6['field4'] = $mini_card_6_array->field4_kz;
            $card7_title = $this->card7_title_kz;
            $card7_text = $this->card7_text_kz;
            $card7_subtitle = $this->card7_subtitle_kz;
            $mini_card_7_array = json_decode($this->mini_card_7);
            $mini_card_7['subtitle'] = $mini_card_7_array->subtitle_kz;
            $mini_card_7['annotation'] = $mini_card_7_array->annotation_kz;
            $mini_card_7['field1'] = $mini_card_7_array->field1_kz;
            $mini_card_7['field2'] = $mini_card_7_array->field2_kz;
            $mini_card_7['field3'] = $mini_card_7_array->field3_kz;
            $mini_card_7['field4'] = $mini_card_7_array->field4_kz;
            $card8_title = $this->card8_title_kz;
            $card8_text = $this->card8_text_kz;
            $card8_subtitle = $this->card8_subtitle_kz;
            $mini_card_8_array = json_decode($this->mini_card_8);
            $mini_card_8['subtitle'] = $mini_card_8_array->subtitle_kz;
            $mini_card_8['annotation'] = $mini_card_8_array->annotation_kz;
            $mini_card_8['field1'] = $mini_card_8_array->field1_kz;
            $mini_card_8['field2'] = $mini_card_8_array->field2_kz;
            $mini_card_8['field3'] = $mini_card_8_array->field3_kz;
            $mini_card_8['field4'] = $mini_card_8_array->field4_kz;
            $card9_title = $this->card9_title_kz;
            $card9_text = $this->card9_text_kz;
            $card9_subtitle = $this->card9_subtitle_kz;
            $mini_card_9_array = json_decode($this->mini_card_9);
            $mini_card_9['subtitle'] = $mini_card_9_array->subtitle_kz;
            $mini_card_9['annotation'] = $mini_card_9_array->annotation_kz;
            $mini_card_9['field1'] = $mini_card_9_array->field1_kz;
            $mini_card_9['field2'] = $mini_card_9_array->field2_kz;
            $mini_card_9['field3'] = $mini_card_9_array->field3_kz;
            $mini_card_9['field4'] = $mini_card_9_array->field4_kz;
            $block2_image = $this->block2_image_url;
        }
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
            'form_image' => $this->form_image_url,
            'news' => $news
        ];
    }
}
