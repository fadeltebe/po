<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgenSeeder extends Seeder
{
    public function run(): void
    {
        $travel = DB::table('travels')->first();

        DB::table('agens')->insert([
            [
                'nama' => 'Palu',
                'travel_id' => $travel->id,
                'alamat' => 'Jl. Palu',
                'nomor_hp' => '0811111111',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'nama' => 'Ampana',
                'travel_id' => $travel->id,
                'alamat' => 'Jl. Ampana',
                'nomor_hp' => '0822222222',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'nama' => 'Luwuk',
                'travel_id' => $travel->id,
                'alamat' => 'Jl. Luwuk',
                'nomor_hp' => '0833333333',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
