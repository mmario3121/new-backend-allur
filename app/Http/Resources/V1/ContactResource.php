<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
        return [
            'address' => $this->addressTranslate?->{$language},
            'address_link' => $this->address_link,
            'phone' => $this->phone,
            'phone_link' => $this->phone_link,
            'email' => $this->email,
            'email_link' => $this->email_link,
            'whatsapp_link' => $this->whatsapp_link,
            'telegram_link' => $this->telegram_link,
        ];
    }
}
