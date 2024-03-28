<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
            'name' => 'Толеби Жаксыбай',
            'email' => 'tolebizaksybaj@gmail.com',
            'password' => 'asdasd',
            'email_verified_at' => now(),
        ])->assignRole(['developer']);

        User::create([
            'name' => 'admin',
            'email' => 'admin@hongqi.kz',
            'password' => 'admin',
            'email_verified_at' => now(),
        ])->assignRole(['admin']);
    }
}
