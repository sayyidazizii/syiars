<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CoreDusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('core_dusun')->insert([
            ['dusun_id' => 1, 'kelurahan_id' => 283362, 'dusun_code' => '', 'dusun_name' => 'Bakaran', 'data_state' => 0],
            ['dusun_id' => 2, 'kelurahan_id' => 283362, 'dusun_code' => '', 'dusun_name' => 'Soko', 'data_state' => 0],
            ['dusun_id' => 3, 'kelurahan_id' => 283362, 'dusun_code' => '', 'dusun_name' => 'Mbakdalem', 'data_state' => 0],
            ['dusun_id' => 4, 'kelurahan_id' => 283362, 'dusun_code' => '', 'dusun_name' => 'Doplang', 'data_state' => 0],
        ]);
    }
}
