<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tikets')->insert([
            [
                'travel_id' => 1,
                'pemesanan_id' => 1,
                'penumpang_id' => 1,
                'kursi_nomor' => '12A',
                'harga' => 85000,
                'status' => 'aktif',
                'catatan' => 'Contoh tiket',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // lainnya...
        ]);
    }
}
