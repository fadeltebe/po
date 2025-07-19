<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        $travel = DB::table('travels')->first();

        foreach (['Pak Udin', 'Pak Budi', 'Pak Joko'] as $nama) {
            DB::table('drivers')->insert([
                'travel_id' => $travel->id,
                'nama' => $nama,
                'nomor_hp' => '08' . rand(1000000000, 9999999999),
                'alamat' => 'Jl. Sopir ' . $nama,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
