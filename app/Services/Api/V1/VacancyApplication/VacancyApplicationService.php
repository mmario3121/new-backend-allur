<?php

namespace App\Services\Api\V1\VacancyApplication;

use App\Models\VacancyApplication;
use App\Services\FileService;

class VacancyApplicationService
{
    protected FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function create(array $data)
    {
        return VacancyApplication::query()->create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'file' => $this->fileService->saveFile($data['file'], VacancyApplication::FILE_PATH)
        ]);
    }
}
