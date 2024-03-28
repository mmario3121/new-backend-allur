<?php

namespace App\Services\Admin;

use App\Models\Application;

class ApplicationService
{
    public function update(Application $application, array $data)
    {
        return $application->update([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'] ?? null,
            'city_id' => $data['city_id'],
            'status' => $data['status'],
            'comment' => $data['comment'] ?? null,
        ]);
    }

    public function delete(Application $application)
    {
        return $application->delete();
    }
}
