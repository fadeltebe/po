<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pemesanans')->insert([
            [
                'travel_id' => 1,
                'perjalanan_id' => 2,
                'user_id' => null,
                'nama_pemesan' => 'M. Surya',
                'no_hp_pemesan' => '0813-xxx',
                'status' => 'baru',
                'total_harga' => 0,
                'catatan' => 'Contoh catatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // tambahkan data lainnya...
        ]);
    }
}
