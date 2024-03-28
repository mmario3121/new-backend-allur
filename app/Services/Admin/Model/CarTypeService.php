<?php

namespace App\Services\Admin\Model;

use App\Models\CarType;
use App\Services\FileService;

class CarTypeService
{
    protected FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function create(array $data)
    {
        return CarType::query()->create([
            'title' => $data['title'],
            'title_kz' => $data['title_kz'],
        ]);
    }

    public function update(CarType $type, array $data)
    {
        $type->title = $data['title'];
        $type->title_kz = $data['title_kz'];
        return $type->save();
    }

    public function delete(CarType $type)
    {
        return $type->delete();
    }
}
