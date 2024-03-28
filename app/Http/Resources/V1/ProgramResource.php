<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
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

        $code = $this->code ? " (" . $this->code . ")" : "";

        return [
            'id' => $this->id,
            'title' => $this->titleTranslate?->{$language} . $code,
        ];
    }
}
