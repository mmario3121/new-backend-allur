<?php

namespace App\Services\Admin\Agreement;

use App\Models\Agreement;
use App\Models\Translate;
use App\Services\FileService;
use App\Services\TranslateService;

class AgreementService
{
    protected FileService $fileService;
    protected TranslateService $translateService;

    public function __construct(TranslateService $translateService, FileService $fileService)
    {
        $this->translateService = $translateService;
        $this->fileService = $fileService;
    }

    public function create(array $data)
    {
        return Agreement::query()->create([
            'link' => $this->translateService->createTranslateFile($data['file'], Agreement::FILE_PATH),
            'type' => $data['type']
        ]);
    }

    public function update(Agreement $agreement, array $data)
    {
        $this->translateService->updateTranslateFile($data['file'], Agreement::FILE_PATH, $agreement->link);
        $agreement->type = $data['type'];
        return $agreement->save();
    }

    public function delete(Agreement $agreement)
    {
        if ($agreement->fileTranslate) {
            foreach (Translate::LANGUAGES as $language) {
                $this->fileService->deleteFile($agreement->fileTranslate->{$language}, Agreement::FILE_PATH);
            }
            $agreement->fileTranslate()->delete();
        }

        return $agreement->delete();
    }

    public function deleteFile(Agreement $agreement, string $language)
    {
        $file = $agreement->fileTranslate->{$language};

        $this->fileService->deleteFile($file, Agreement::FILE_PATH);

        $agreement->fileTranslate->{$language} = null;
        $agreement->fileTranslate->save();

        return true;
    }
}
