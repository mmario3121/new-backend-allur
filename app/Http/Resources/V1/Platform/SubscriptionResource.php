<?php

namespace App\Http\Resources\V1\Platform;

use App\Models\SubscriptionAccess;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
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

        SubscriptionAccess::query()
            ->where('subscription_id', '=', $this->id)
            ->where('user_id', '=', auth()->id())
            ->whereDate('end_date', '<', now())
            ->update(['status' => 0]);

        $subscriptionAccess = SubscriptionAccess::query()
            ->where('subscription_id', '=', $this->id)
            ->where('user_id', '=', auth()->id())
            ->where('status', '=', 1)
            ->exists();

        $isBuy = true;
        if ($subscriptionAccess) {
            $isBuy = false;
        }

        return [
            'id' => $this->id,
            'title' => $this->titleTranslate?->{$language},
            'description' => $this->descriptionTranslate?->{$language},
            'image' => $this->image_url,
            'is_buy' => $isBuy,
            'price' => $this->prices,
            'type_name' => 'subscription',
//            'type_id' => $this->id,
            'type_id_2' => $this->id,
        ];
    }
}
