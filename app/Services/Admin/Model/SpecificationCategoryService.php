<?php

namespace App\Services\Admin\Model;

use App\Models\SpecificationCategory;
use App\Services\FileService;

class SpecificationCategoryService
{
    protected FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function create(array $data)
    {
        return SpecificationCategory::query()->create([
            'model_id' => $data['model_id'],
            'title' => $data['title'],
            'title_kz' => $data['title_kz'],
            'position' => $data['position'],
        ]);
    }

    public function update(SpecificationCategory $color, array $data)
    {
        $color->position = $data['position'];
        $color->title = $data['title'];
        $color->title_kz = $data['title_kz'];
        return $color->save();
    }

    public function delete(SpecificationCategory $color)
    {
        return $color->delete();
    }
}
