<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
                'no_hp' => '0811111111',
                'status' => 'aktif'
            ],
            [
                'nama' => 'Driver 1',
                'email' => 'driver@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'driver',
                'no_hp' => '0822222222',
                'status' => 'aktif'
            ],
            [
                'nama' => 'User 1',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'user',
                'no_hp' => '0833333333',
                'status' => 'aktif'
            ]
        ]);
    }
}