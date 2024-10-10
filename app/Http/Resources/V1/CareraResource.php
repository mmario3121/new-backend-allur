<?php

namespace App\Http\Resources\V1;

use App\Models\CareraBanner;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\ArticleResource;
use App\Models\Article;

class CareraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // protected $appends = ['block1_image_url', 'block2_image_url', 'block3_image_url'];
        // protected $fillable = ['block1_title', 'block1_text', 'block1_image', 'block2_title', 'block2_text', 'block2_image', 'block3_image'];
        if($request->lang == 'ru'){
            $block1_title = $this->block1_title;
            $block1_text = $this->block1_text;
            $block1_image = $this->block1_image_url;
            $block2_title = $this->block2_title;
            $block2_text = $this->block2_text;
            $block2_image = $this->block2_image_url;
            $block3_image = $this->block3_image_url;
        }else{
            $block1_title = $this->block1_title;
            $block1_text = $this->block1_text;
            $block1_image = $this->block1_image_url;
            $block2_title = $this->block2_title;
            $block2_text = $this->block2_text;
            $block2_image = $this->block2_image_url;
            $block3_image = $this->block3_image_url;     
        }
        
        $block4 = CareraBannerResource::collection(CareraBanner::all());
        return [
            'block1_title' => $block1_title,
            'block1_text' => $block1_text,
            'block1_image' => $block1_image,
            'block2_title' => $block2_title,
            'block2_text' => $block2_text,
            'block2_image' => $block2_image,
            'block3_image' => $block3_image,
            'block4' => $block4,
        ];
    }
}
