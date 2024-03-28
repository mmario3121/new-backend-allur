<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'developer'],
            ['name' => 'admin'],
            ['name' => 'manager'],
            ['name' => 'dealer'],
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role['name']]);
        }
    }
}
