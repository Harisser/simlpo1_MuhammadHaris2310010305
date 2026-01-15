<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Dinkes',
                'email' => 'admin@simlpo.test',
                'password' => Hash::make('password'),
                'role' => 'AdminDinkes',
                'id_apotek' => null,
                'is_active' => 1
            ],
            [
                'name' => 'Kasir Apotek',
                'email' => 'kasir@simlpo.test',
                'password' => Hash::make('password'),
                'role' => 'Kasir',
                'id_apotek' => 1,
                'is_active' => 1
            ]
        ]);
    }
}
