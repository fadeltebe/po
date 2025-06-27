<?php

namespace Database\Seeders;

use App\Models\Perjalanan;
use App\Models\PO;
use App\Models\Mobil;
use App\Models\Driver;
use App\Models\Rute;
use Illuminate\Database\Seeder;

class PerjalananSeeder extends Seeder
{
    public function run(): void
    {
        $po = PO::first();
        $mobils = Mobil::where('po_id', $po->id)->get();
        $drivers = Driver::where('po_id', $po->id)->get();
        $rutes = Rute::where('po_id', $po->id)->get();

        // Buat 3 perjalanan, satu untuk tiap mobil dan driver
        for ($i = 0; $i < 3; $i++) {
            Perjalanan::create([
                'po_id' => $po->id,
                'mobil_id' => $mobils[$i]->id ?? $mobils->random()->id,
                'driver_id' => $drivers[$i]->id ?? $drivers->random()->id,
                'rute_id' => $rutes->random()->id,
                'tanggal_berangkat' => now()->addDays($i),
                'jam_berangkat' => now()->addHours(8 + $i)->format('H:i:s'),
                'status' => 'dijadwalkan',
            ]);
        }
    }
}
