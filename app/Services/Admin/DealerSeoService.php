<?php

namespace App\Services\Admin;

use App\Models\DealerSeo;
use App\Services\FileService;
use App\Services\TranslateService;

class DealerSeoService
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
        return DealerSeo::query()->create([
            'code' => $data['code'],
            'position' => $data['position'],
            'dealer_id' => $data['dealer_id'],
        ]);
    }

    public function update(DealerSeo $dealerSeo, array $data)
    {
        $dealerSeo->code = $data['code'];
        $dealerSeo->position = $data['position'];
        // $dealerSeo->dealer_id = $data['dealer_id'];

        return $dealerSeo->save();
    }

    public function delete(DealerSeo $dealerSeo)
    {
        return $dealerSeo->delete();
    }
}
