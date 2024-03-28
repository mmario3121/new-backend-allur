<?php

namespace App\Services\Admin\City;

use App\Models\City;
use App\Services\TranslateService;

class CityService
{
    protected TranslateService $translateService;

    public function __construct(TranslateService $translateService)
    {
        $this->translateService = $translateService;
    }

    public function create(array $data)
    {
        return City::query()->create([
            'title' => $this->translateService->createTranslate($data['title']),
            'bitrix_id' => $data['bitrix_id'],
        ]);
    }

    public function update(City $city, array $data)
    {
        return $city->update([
            'title' => $this->translateService->updateTranslate($city->title, $data['title']),
            'bitrix_id' => $data['bitrix_id'],
        ]);
    }

    public function delete(City $city)
    {
        $city->titleTranslate?->delete();
        return $city->delete();
    }
}
