<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserStatisticsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $diff = now()->diff($this->created_at);

        if ($diff->y == 0 && $diff->m == 0) {
            if ($diff->d == 0) {
                $usePlatform = "Сегодня";
            } else {
                $usePlatform = $diff->d . " дней";
            }
        } else {
            $usePlatform = $diff->m . " месяца";
        }

        return [
            'program_view_count' => count(auth()->user()->universityProgramViews),
            'program_favourite_count' => count(auth()->user()->universityProgramFavourites),
            'use_platform' => $usePlatform,
        ];
    }
}
