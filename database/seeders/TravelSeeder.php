<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TravelSeeder extends Seeder
{
    public function run(): void
    {
        $paket = DB::table('pakets')->where('nama', 'Trial')->first();

        DB::table('travels')->insert([
            'name' => 'P.O Kesayangan Anda',
            'slug' => 'kesayangan-anda',
            'owner_nama' => 'Pak Haji Ramli',
            'owner_hp' => '081234567890',
            'alamat' => 'Jl. Trans Sulawesi, Palu',
            'paket_id' => $paket->id,
            'tanggal_aktif' => now(),
            'tanggal_berakhir' => now()->addDays($paket->durasi_hari),
            'status' => 'aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
