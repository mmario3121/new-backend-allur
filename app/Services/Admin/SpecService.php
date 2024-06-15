<?php

namespace App\Services\Admin;

use App\Models\Spec;
use App\Services\FileService;
use App\Services\TranslateService;

class SpecService
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
        return Spec::query()->create([
            'type' => $data['type'],
            'value' => $data['value'],
            'complectation_id' => $data['complectation_id'],
        ]);
    }

    public function update(Spec $komek, array $data)
    {
        $komek->type = $data['type'];   
        $komek->value = $data['value'];
        $komek->complectation_id = $data['complectation_id'];
        return $komek->save();
    }

    public function delete(Spec $komek)
    {
        return $komek->delete();
    }
}
