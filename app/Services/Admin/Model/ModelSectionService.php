<?php

namespace App\Services\Admin\Model;

use App\Models\ModelSection;
use App\Services\FileService;

class ModelSectionService
{
    protected FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function create(array $data)
    {
        return ModelSection::query()->create([
            'model_id' => $data['model_id'],
            'title' => $data['title'],
            'image' => isset($data['image']) ? $this->fileService->saveFile($data['image'], ModelSection::IMAGE_PATH) : null,
        ]);
    }

    public function update(ModelSection $section, array $data)
    {
        if (isset($data['image'])) {
            $section->image = $this->fileService->saveFile($data['image'], ModelSection::IMAGE_PATH, $section->image);
        }
        // $section->model_id = $data['model_id'];
        $section->title = $data['title'];
        return $section->save();
    }

    public function delete(ModelSection $section)
    {
        return $section->delete();
    }
}
