<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class LibraryModelResource extends JsonResource
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
        if($request->lang == 'kz'){
            $title = $this->title_kz;
        }else{
            $title = $this->title;
        }
        $librariesByType = $this->libraries->groupBy(function ($library, $key) use ($lang) {
            return $library->getType($lang);
        });
    
        return [
            'id' => $this->id,
            'title' => $this->title,
            'libraries' => $librariesByType->map(function ($libraries, $title) {
                return [
                    'title' => $title,
                    'type' => $libraries->first()->type,
                    'items' => LibraryResource::collection($libraries),
                ];
            })->values(),
        ];
    }
}
