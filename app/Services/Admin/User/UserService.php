<?php

namespace App\Services\Admin\User;

use App\Models\User;

class UserService
{
    public function createUser(array $data)
    {
        return User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'password' => $data['password'],
            'city_id' => $data['city_id'] ?? null,
        ])->assignRole($data['role']);
    }

    public function updateUser(array $data, User $user)
    {
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'] ?? null;
        $user->city_id = $data['city_id'] ?? null;

        if ($data['password']) {
            $user->password = $data['password'];
        }
        $user->syncRoles($data['role']);
        return $user->save();
    }

    public function deleteUser(User $user)
    {
        $user->syncRoles([]);
        return $user->delete();
    }
}
