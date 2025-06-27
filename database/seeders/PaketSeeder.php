<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pakets')->insert([
            [
                'nama' => 'Trial',
                'max_armada' => 1,
                'max_lokasi' => 1,
                'harga_per_bulan' => 0,
                'durasi_hari' => 7,
                'is_trial' => true,
            ],
            [
                'nama' => 'Silver',
                'max_armada' => 3,
                'max_lokasi' => 3,
                'harga_per_bulan' => 99000,
                'durasi_hari' => 30,
                'is_trial' => false,
            ],
            [
                'nama' => 'Gold',
                'max_armada' => 10,
                'max_lokasi' => 10,
                'harga_per_bulan' => 199000,
                'durasi_hari' => 90,
                'is_trial' => false,
            ],
        ]);
    }
}
