<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('system_user')->insert([
            'uuid' => \Illuminate\Support\Str::uuid(), // Mengenerate UUID
            'name' => 'administrator',
            'full_name' => 'administrator',
            'email' => 'admin@example.com', // Ubah email sesuai kebutuhan
            'password' => Hash::make('123456'), // Hashing password 123456
            'created_id' => 1, // Jika ada, sesuaikan dengan kebutuhan
            'updated_id' => 1,
            'branch_id' => 1,
            'data_state' => 0,
            'email_verified_at' => now(), // Mengisi kapan email diverifikasi
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
    }
}
