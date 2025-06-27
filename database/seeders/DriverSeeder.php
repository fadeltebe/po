<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\PO;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        $po = PO::first();

        $drivers = [
            [
                'nama' => 'Pak Darman',
                'nomor_hp' => '081234000001',
                'sim' => 'SIM1234567',
                'alamat' => 'Palu',
            ],
            [
                'nama' => 'Pak Ilham',
                'nomor_hp' => '081234000002',
                'sim' => 'SIM2234567',
                'alamat' => 'Ampana',
            ],
            [
                'nama' => 'Pak Yusuf',
                'nomor_hp' => '081234000003',
                'sim' => 'SIM3234567',
                'alamat' => 'Luwuk',
            ],
        ];

        foreach ($drivers as $data) {
            Driver::create([
                ...$data,
                'po_id' => $po->id,
                'status' => 'aktif',
            ]);
        }
    }
}
