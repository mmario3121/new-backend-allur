<?php

namespace App\Services\Admin\Model;

use App\Models\ModelColor;
use App\Services\FileService;

class ModelColorService
{
    protected FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function create(array $data)
    {
        return ModelColor::query()->create([
            'model_id' => $data['model_id'],
            'title' => $data['title'],
            'title_kz' => $data['title_kz'],
            'image' => isset($data['image']) ? $this->fileService->saveFile($data['image'], ModelColor::IMAGE_PATH) : null,
            'hex' => isset($data['hex']) ? $this->fileService->saveFile($data['hex'], ModelColor::IMAGE_PATH) : null,
            'position' => $data['position'],
        ]);
    }

    public function update(ModelColor $color, array $data)
    {
        if (isset($data['image'])) {
            $color->image = $this->fileService->saveFile($data['image'], ModelColor::IMAGE_PATH, $color->image);
        }
        if (isset($data['hex'])) {
            $color->hex = $this->fileService->saveFile($data['hex'], ModelColor::IMAGE_PATH, $color->hex);
        }
        // $color->model_id = $data['model_id'];
        $color->position = $data['position'];
        $color->title = $data['title'];
        $color->title_kz = $data['title_kz'];
        return $color->save();
    }

    public function delete(ModelColor $color)
    {
        return $color->delete();
    }
}
