<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("Akun")->insert([
            [
                'fullname' => 'Khoirul Huda',
                'username'=> 'huda',
                'email'=> 'huda@gmail.com',
                'password'=> 'huda',
                'level'=> 'admin',
                'alamat' => 'Indonesia',
                'dompet' => '1',
            ],
            [
                'fullname' => 'User',
                'username'=> 'user',
                'email'=> 'user@gmail.com',
                'password'=> 'user',
                'level'=> 'user',
                'alamat' => 'Indonesia',
                'dompet' => '2',
            ],
        ]);
    }
}
