<?php

namespace App\Services\Admin;

use App\Models\Library;
use App\Services\FileService;
use App\Services\TranslateService;

class LibraryService
{
    protected FileService $fileService;
    protected TranslateService $translateService;

    public function __construct(FileService $fileService, TranslateService $translateService)
    {
        $this->fileService = $fileService;
        $this->translateService = $translateService;
    }

    public function create(array $data)
    {
        if(isset($data['cover_photo'])){
            $cover = $this->fileService->saveFile($data['cover_photo'], Library::IMAGE_PATH);
        }else{
            $cover = null;
        }
        return Library::query()->create([
            'file' => $this->fileService->saveFile($data['file'], Library::IMAGE_PATH),
            'type' => $data['type'],
            'position' => $data['position'],
            'file_name' => $data['file_name'],
            'model_id' => intval($data['model_id']),
            'cover_photo' => $cover,
        ]);
    }

    public function update(Library $library, array $data)
    {
        $library->type = $data['type'];
        $library->position = $data['position'];
        $library->model_id = $data['model_id'];
        $library->file_name = $data['file_name'];
        if (isset($data['file'])) {
            $library->file = $this->fileService->saveFile($data['file'], Library::IMAGE_PATH, $library->file);
        }
        if(isset($data['cover_photo'])){
            $library->cover_photo = $this->fileService->saveFile($data['cover_photo'], Library::IMAGE_PATH, $library->cover_photo);
        }
        return $library->save();
    }

    public function delete(Library $library)
    {
        return $library->delete();
    }
}
