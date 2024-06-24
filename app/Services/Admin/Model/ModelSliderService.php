<?php

namespace App\Services\Admin\Model;

use App\Models\ModelSlider;
use App\Services\FileService;

class ModelSliderService
{
    protected FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function create(array $data)
    {
        return ModelSlider::query()->create([
            'model_id' => $data['model_id'],
            'image' => isset($data['image']) ? $this->fileService->saveFile($data['image'], ModelSlider::IMAGE_PATH) : null,
            'section' => $data['section'],
            'position' => $data['position'],
        ]);
    }

    public function update(ModelSlider $color, array $data)
    {
        if (isset($data['image'])) {
            $color->image = $this->fileService->saveFile($data['image'], ModelSlider::IMAGE_PATH, $color->image);
        }
        $color->position = $data['position'];
        $color->section = $data['section'];
        return $color->save();
    }

    public function delete(ModelSlider $color)
    {
        return $color->delete();
    }
}
