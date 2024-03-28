<?php

namespace App\Services\Admin;

use App\Models\Dealer;
use App\Services\FileService;
use App\Services\TranslateService;

class DealerService
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
        return Dealer::query()->create([
            'name' => $data['name'],
            'name_kz' => $data['name_kz'],
            'url' => $data['url'],
            'bitrix_id' => $data['bitrix_id'],
            'city_id' => $data['city_id'],
            'user_id' => $data['user_id'],
        ]);
    }

    public function update(Dealer $dealer, array $data)
    {
        $dealer->name = $data['name'];
        $dealer->name_kz = $data['name_kz'];
        $dealer->url = $data['url'];
        $dealer->bitrix_id = $data['bitrix_id'];
        $dealer->city_id = $data['city_id'];

        return $dealer->save();
    }

    public function delete(Dealer $dealer)
    {
        return $dealer->delete();
    }
}
