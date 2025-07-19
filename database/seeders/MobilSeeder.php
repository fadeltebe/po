<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MobilSeeder extends Seeder
{
    public function run(): void
    {
        $travel = DB::table('travels')->first();

        foreach (['DN1234AA', 'DN5678BB', 'DN9999CC'] as $plat) {
            DB::table('mobils')->insert([
                'travel_id' => $travel->id,
                'plat_nomor' => $plat,
                'merk' => 'Toyota',
                'tipe' => 'Hiace',
                'tahun' => '2023',
                'warna' => 'Putih',
                'kapasitas_kursi' => 12,
                'no_rangka' => 'RANGKA' . rand(1000, 9999),
                'no_mesin' => 'MESIN' . rand(1000, 9999),
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
