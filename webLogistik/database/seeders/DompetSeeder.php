<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DompetSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("dompet")->insert([
            [
                'saldo' => '100000',
                'bonus'=> '200',
            ],
            [
                'saldo' => '25000',
                'bonus'=> '15',
            ],
        ]);
    }
}
