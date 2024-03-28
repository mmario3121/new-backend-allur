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
            'bitrix_id' => $data['bitrix_id'],
            'is_active' => $data['is_active'] ?? 0,
            'brand_id' => $data['brand_id'],
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
        $model->type_id = $data['type_id'];
        $model->slug = $data['slug'];
        $model->title = $data['title'];
        $model->title_kz = $data['title_kz'];
        $model->bitrix_id = $data['bitrix_id'];
        $model->is_active = $data['is_active'] ?? 0;
        $model->brand_id = $data['brand_id'];
        return $model->save();
    }

    public function delete(CarModel $model)
    {
        return $model->delete();
    }
}
