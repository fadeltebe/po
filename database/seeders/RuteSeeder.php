<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuteSeeder extends Seeder
{
    public function run(): void
    {
        $travel = DB::table('travels')->first();
        $agens = DB::table('agens')->pluck('id', 'nama');

        DB::table('rutes')->insert([
            ['travel_id' => $travel->id, 'lokasi_asal_id' => $agens['Palu'], 'lokasi_tujuan_id' => $agens['Ampana'], 'jarak_km' => 350, 'estimasi_jam' => 9, 'harga_default' => 150000, 'created_at' => now(), 'updated_at' => now()],
            ['travel_id' => $travel->id, 'lokasi_asal_id' => $agens['Ampana'], 'lokasi_tujuan_id' => $agens['Palu'], 'jarak_km' => 350, 'estimasi_jam' => 9, 'harga_default' => 150000, 'created_at' => now(), 'updated_at' => now()],
            ['travel_id' => $travel->id, 'lokasi_asal_id' => $agens['Palu'], 'lokasi_tujuan_id' => $agens['Luwuk'], 'jarak_km' => 600, 'estimasi_jam' => 13, 'harga_default' => 200000, 'created_at' => now(), 'updated_at' => now()],
            ['travel_id' => $travel->id, 'lokasi_asal_id' => $agens['Luwuk'], 'lokasi_tujuan_id' => $agens['Palu'], 'jarak_km' => 600, 'estimasi_jam' => 13, 'harga_default' => 200000, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
