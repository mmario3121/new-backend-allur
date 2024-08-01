<?php

namespace App\Services\Admin\Model;

use App\Models\CarModel;
use App\Services\FileService;

class CarModelService
{
    protected FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function create(array $data)
    {
        return CarModel::query()->create([
            'type_id' => $data['type_id'],
            'slug' => $data['slug'],
            'title' => $data['title'],
            'title_kz' => $data['title_kz'],
            'logo' => isset($data['logo']) ? $this->fileService->saveFile($data['logo'], CarModel::IMAGE_PATH) : null,
            'video' => isset($data['video']) ? $this->fileService->saveFile($data['video'], CarModel::IMAGE_PATH) : null,
            'price_list' => isset($data['price_list']) ? $this->fileService->saveFile($data['price_list'], CarModel::IMAGE_PATH) : null,
            'document' => isset($data['document']) ? $this->fileService->saveFile($data['document'], CarModel::IMAGE_PATH) : null,
            'main_page_image' => isset($data['main_page_image']) ? $this->fileService->saveFile($data['main_page_image'], CarModel::IMAGE_PATH) : null,
            'bitrix_id' => $data['bitrix_id'],
            'is_active' => $data['is_active'] ?? 0,
            'brand_id' => $data['brand_id'],
            'char1_title' => $data['char1_title'],
            'char1_value' => $data['char1_value'],
            'char2_title' => $data['char2_title'],
            'char2_value' => $data['char2_value'],
            'char3_title' => $data['char3_title'],
            'char3_value' => $data['char3_value'],
            'char4_title' => $data['char4_title'],
            'char4_value' => $data['char4_value'],
        ]);
    }

    public function update(CarModel $model, array $data)
    {
        if (isset($data['logo'])) {
            $model->logo = $this->fileService->saveFile($data['logo'], CarModel::IMAGE_PATH, $model->logo);
        }
        if (isset($data['video'])) {
            $model->video = $this->fileService->saveFile($data['video'], CarModel::IMAGE_PATH, $model->video);
        }
        if (isset($data['price_list'])) {
            $model->price_list = $this->fileService->saveFile($data['price_list'], CarModel::IMAGE_PATH, $model->price_list);
        }
        if (isset($data['document'])) {
            $model->document = $this->fileService->saveFile($data['document'], CarModel::IMAGE_PATH, $model->document);
        }
        if (isset($data['main_page_image'])) {
            $model->main_page_image = $this->fileService->saveFile($data['main_page_image'], CarModel::IMAGE_PATH, $model->main_page_image);
        }
        $model->type_id = $data['type_id'];
        $model->slug = $data['slug'];
        $model->title = $data['title'];
        $model->title_kz = $data['title_kz'];
        $model->bitrix_id = $data['bitrix_id'];
        $model->is_active = $data['is_active'] ?? 0;
        $model->brand_id = $data['brand_id'];
        $model->char1_title = $data['char1_title'];
        $model->char1_value = $data['char1_value'];
        $model->char2_title = $data['char2_title'];
        $model->char2_value = $data['char2_value'];
        $model->char3_title = $data['char3_title'];
        $model->char3_value = $data['char3_value'];
        $model->char4_title = $data['char4_title'];
        $model->char4_value = $data['char4_value'];
        return $model->save();
    }

    public function delete(CarModel $model)
    {
        return $model->delete();
    }
}
