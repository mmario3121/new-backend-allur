<?php

namespace App\Services\Admin\Model;

use App\Models\ModelComplectation;
use App\Services\FileService;

class ModelComplectationService
{
    protected FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function create(array $data)
    {
        return ModelComplectation::query()->create([
            'model_id' => $data['model_id'],
            'title' => $data['title'],
            'price' => $data['price'],
            'bitrix_id' => $data['bitrix_id'],
            'is_active' => $data['is_active'] ?? 0,
        ]);
    }

    public function update(ModelComplectation $color, array $data)
    {
        if (isset($data['image'])) {
            $color->image = $this->fileService->saveFile($data['image'], ModelComplectation::IMAGE_PATH, $color->image);
        }
        // $color->model_id = $data['model_id'];
        $color->price = $data['price'];
        $color->title = $data['title'];
        $color->bitrix_id = $data['bitrix_id'];
        $color->is_active = $data['is_active'] ?? 0;
        return $color->save();
    }

    public function delete(ModelComplectation $color)
    {
        return $color->delete();
    }
}
