<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenumpangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penumpangs')->insert([
            [
                'travel_id' => 1,
                'nama' => 'Dwi Yuliana',
                'nik' => '3301234567890123',
                'no_hp' => '0812-xxx',
                'alamat' => 'Jl. Merdeka No. 10',
                'is_langganan' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // lainnya...
        ]);
    }
}
