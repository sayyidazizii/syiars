<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CoreProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('core_province')->insert([
            ['province_id' => 62, 'province_code' => '', 'province_name' => 'Bali', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 63, 'province_code' => '', 'province_name' => 'Bangka Belitung', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 64, 'province_code' => '', 'province_name' => 'Banten', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 65, 'province_code' => '', 'province_name' => 'Bengkulu', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 66, 'province_code' => '', 'province_name' => 'DI Yogyakarta', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 67, 'province_code' => '', 'province_name' => 'DKI Jakarta', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 68, 'province_code' => '', 'province_name' => 'Gorontalo', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 69, 'province_code' => '', 'province_name' => 'Jambi', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 70, 'province_code' => '', 'province_name' => 'Jawa Barat', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 71, 'province_code' => '', 'province_name' => 'Jawa Tengah', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 72, 'province_code' => '', 'province_name' => 'Jawa Timur', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 73, 'province_code' => '', 'province_name' => 'Kalimantan Barat', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 74, 'province_code' => '', 'province_name' => 'Kalimantan Selatan', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 75, 'province_code' => '', 'province_name' => 'Kalimantan Tengah', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 76, 'province_code' => '', 'province_name' => 'Kalimantan Timur', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 77, 'province_code' => '', 'province_name' => 'Kalimantan Utara', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 78, 'province_code' => '', 'province_name' => 'Kepulauan Riau', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 79, 'province_code' => '', 'province_name' => 'Lampung', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 80, 'province_code' => '', 'province_name' => 'Maluku', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 81, 'province_code' => '', 'province_name' => 'Maluku Utara', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 82, 'province_code' => '', 'province_name' => 'Nanggroe Aceh Darussalam (NAD)', 'province_no' => '', 'data_state' => 0],
            ['province_id' => 83, 'province_code' => '', 'province_name' => 'Nusa Tenggara Barat (NTB)', 'province_no' => '', 'data_state' => 0],
        ]);
    }
}
