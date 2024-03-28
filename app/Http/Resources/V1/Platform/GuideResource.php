<?php

namespace App\Http\Resources\V1\Platform;

use App\Models\GuideAccess;
use Illuminate\Http\Resources\Json\JsonResource;

class GuideResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $language = app()->getLocale();

        $guideAccess = GuideAccess::query()
            ->where('user_id', '=', auth()->id())
            ->where('guide_id', '=', $this->id)
            ->exists();

        $isBuy = true;
        if ($guideAccess) {
            $isBuy = false;
        }

        return [
            'id' => $this->id,
            'title' => $this->titleTranslate?->{$language},
            'description' => $this->descriptionTranslate?->{$language},
            'image' => $this->image_url,
            'guideImages' => count($this->guideImages) ? GuideImageResource::collection($this->guideImages) : null,
            'price' => $this->price,
            'type' => $this->type,
            'link' => ($this->type == 0) ? $this->guide_url : $this->guide_link,
            'is_buy' => $isBuy,
            'type_name' => 'guide',
//            'type_id' => $this->id,
            'type_id_2' => $this->id,
        ];
    }
}
