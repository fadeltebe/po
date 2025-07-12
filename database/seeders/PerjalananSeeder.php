<?php

namespace Database\Seeders;

use App\Models\Perjalanan;
use App\Models\Mobil;
use App\Models\Driver;
use App\Models\Rute;
use App\Models\Travel;
use Illuminate\Database\Seeder;

class PerjalananSeeder extends Seeder
{
    public function run(): void
    {
        $travel = Travel::first();
        $mobils = Mobil::where('travel_id', $travel->id)->get();
        $drivers = Driver::where('travel_id', $travel->id)->get();
        $rutes = Rute::where('travel_id', $travel->id)->get();

        // Buat 3 perjalanan, satu untuk tiap mobil dan driver
        for ($i = 0; $i < 3; $i++) {
            Perjalanan::create([
                'travel_id' => $travel->id,
                'mobil_id' => $mobils[$i]->id ?? $mobils->random()->id,
                'driver_id' => $drivers[$i]->id ?? $drivers->random()->id,
                'rute_id' => $rutes->random()->id,
                'tanggal_berangkat' => now()->addDays($i),
                'jam_berangkat' => now()->addHours(8 + $i)->format('H:i:s'),
                'status' => 'Dijadwalkan',
            ]);
        }
    }
}
