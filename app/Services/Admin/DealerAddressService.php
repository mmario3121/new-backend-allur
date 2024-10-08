<?php

namespace App\Services\Admin;

use App\Models\DealerAddress;
use App\Services\FileService;
use App\Services\TranslateService;

class DealerAddressService
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
        return DealerAddress::query()->create([
            'address' => $data['address'],
            'address_kz' => $data['address_kz'],
            'address2' => $data['address2'],
            'address2_kz' => $data['address2_kz'],
            'worktime' => $data['worktime'],
            'worktime_kz' => $data['worktime_kz'],
            'phone' => $data['phone'],
            'dealer_id' => $data['dealer_id'],
            'coordinates' => $data['coordinates'],
            'coordinates2' => $data['coordinates2'],
        ]);
    }

    public function update(DealerAddress $dealerAddress, array $data)
    {
        $dealerAddress->address = $data['address'];
        $dealerAddress->address_kz = $data['address_kz'];
        $dealerAddress->address2 = $data['address2'];
        $dealerAddress->address2_kz = $data['address2_kz'];
        $dealerAddress->worktime = $data['worktime'];
        $dealerAddress->worktime_kz = $data['worktime_kz'];
        $dealerAddress->phone = $data['phone'];
        $dealerAddress->coordinates = $data['coordinates'];
        $dealerAddress->coordinates2 = $data['coordinates2'];
        if (isset($data['dealer_id'])) {
            $dealerAddress->dealer_id = $data['dealer_id'];
        }

        return $dealerAddress->save();
    }

    public function delete(DealerAddress $DealerAddress)
    {
        return $DealerAddress->delete();
    }
}
