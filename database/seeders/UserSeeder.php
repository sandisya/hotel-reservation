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
                'name' => 'Sandi',
                'email' => 'sandisya@gmail.com',
                'password' => Hash::make('S4nd1sy4'),
                'role' => 'admin',
            ],
        ]);
    }
}
