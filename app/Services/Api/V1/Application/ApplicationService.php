<?php

namespace App\Services\Api\V1\Application;

use App\Models\Application;

class ApplicationService
{
    public function createOrder(array $data)
    {
        return Application::query()->create(['phone' => $data['phone']]);
    }
}
