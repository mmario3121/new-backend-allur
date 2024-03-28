<?php

namespace App\Services\Admin\Summernote;

use App\Services\FileService;

class SummernoteService
{
    const PATH = 'summernote';

    protected FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function create(object $file): ?string
    {
        $fileName = $this->fileService->saveFile($file, self::PATH);

        return config('app.env' === 'production')
            ? url("uploads/summernote/$fileName", [], true)
            : url("uploads/summernote/$fileName");
    }

    public function delete(string $src = null)
    {
        $baseUrl = config('app.env') == 'production'
            ? str_replace('http', 'https', config('app.url')) . '/uploads/summernote/'
            : config('app.url') . '/uploads/summernote/';

        $fileName = str_replace($baseUrl, '', $src);

        $this->fileService->deleteFile($fileName, self::PATH);
    }
}
