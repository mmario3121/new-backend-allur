<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ModelSectionItem;
class ModelSectionsResource extends JsonResource
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
        $sectionItems = ModelSectionItem::where('section_id', $this->id)->get();
        return [
            'title' => $this->title,
            'image' => $this->image_url,
            'sectionItems' => ModelSectionItemResource::collection($sectionItems),
        ];
    }
}
