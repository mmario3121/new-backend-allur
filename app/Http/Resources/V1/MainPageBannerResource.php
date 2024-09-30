<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\CarModel;

class MainPageBannerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($request->lang == 'ru'){
            $title = $this->title;
            $description = $this->description;
        }else{
            $title = $this->title_kz;
            $description = $this->description_kz;
        }
        $modelIds = $this->model_id;
        $models = [];
        if ($modelIds != null) {
            $carModels = CarModel::whereIn('id', $modelIds)->get();
            foreach ($carModels as $carModel) {
                $model['title'] = $carModel->title;
                $model['bitrix_id'] = $carModel->bitrix_id;
                $model['brand'] = $carModel->brand->code;
                $models[] = $model;
            }
        }

        return [
            'id' => $this->id,
            'title' => $title,
            'description' => $description,
            'image' => $this->image_url,
            'mobile_image' => $this->mobile_image_url,
            'link' => $this->link,
            'models' => $models,
        ];
    }
}
