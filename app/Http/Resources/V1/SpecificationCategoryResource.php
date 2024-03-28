<?php

namespace App\Http\Resources\V1;

use app\Models\Specification;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecificationCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang = $request->lang;
        if($lang == 'ru'){
            $title1 = $this->title;
        }else{
            $title1 = $this->title_kz;
        }

        $specifications = Specification::where('specification_category_id', $this->id)->get();
        if($lang == 'ru'){
            $groupedSpecifications = $specifications->groupBy('title');
        }else{
            //title_kz as title
            $groupedSpecifications = $specifications->groupBy('title_kz');
        }

        // Initialize an empty array to store the transformed data
        $transformedSpecifications = [];

        // Iterate through the grouped specifications
        foreach ($groupedSpecifications as $title => $group) {
            // Create an array for the grouped data
            $iteration = 1;
            $groupData = [
                'title' => $title,
            ];

            // Iterate through the grouped items and extract values based on "complectation"
            foreach ($group as $spec) {
                if($lang == 'ru'){
                    $groupData["value_for_$iteration"] = $spec->value;
                }else{
                    $groupData["value_for_$iteration"] = $spec->value_kz;
                }
                $iteration++;
            }

            // Push the grouped data to the transformedSpecifications array
            $transformedSpecifications[] = $groupData;

        }
        // You can now return $transformedSpecifications as your desired output

        return [
            'id' => $this->id,
            'title' => $title1,
            'specifications' => $transformedSpecifications,
        ];
    }
}
