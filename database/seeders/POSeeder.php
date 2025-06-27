<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class POSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil salah satu paket
        $paket = DB::table('pakets')->where('nama', 'Trial')->first();

        // 1. Buat PO
        $poId = DB::table('pos')->insertGetId([
            'name' => 'P.O Kesayangan Anda',
            'slug' => 'kesayangan-anda',
            'owner_nama' => 'Pak Haji Ramli',
            'owner_hp' => '081234567890',
            'alamat' => 'Jl. Trans Sulawesi, Palu',
            'paket_id' => $paket->id ?? null,
            'tanggal_aktif' => now()->toDateString(),
            'tanggal_berakhir' => now()->addDays($paket->durasi_hari ?? 7)->toDateString(),
            'status' => 'aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Buat 2 admin (lokasi Palu dan Ampana)
        $adminPalu = User::create([
            'name' => 'Admin Palu',
            'email' => 'admin.palu@example.com',
            'password' => Hash::make('password'),

        ]);

        $adminAmpana = User::create([
            'name' => 'Admin Ampana',
            'email' => 'admin.ampana@example.com',
            'password' => Hash::make('password'),
        ]);

        // 3. Lokasi: Palu dan Ampana
        $lokasiPalu = DB::table('lokasis')->insertGetId([
            'nama' => 'Palu',
            'po_id' => $poId,
            'user_id' => $adminPalu->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $lokasiAmpana = DB::table('lokasis')->insertGetId([
            'nama' => 'Ampana',
            'po_id' => $poId,
            'user_id' => $adminAmpana->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Lokasi tambahan: Luwuk
        $adminLuwuk = User::create([
            'name' => 'Admin Luwuk',
            'email' => 'admin.luwuk@example.com',
            'password' => Hash::make('password'),
        ]);

        $lokasiLuwuk = DB::table('lokasis')->insertGetId([
            'nama' => 'Luwuk',
            'po_id' => $poId,
            'user_id' => $adminLuwuk->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 4. Tambah 3 mobil
        foreach (['DN1234AA', 'DN5678BB', 'DN9999CC'] as $index => $plat) {
            DB::table('mobils')->insert([
                'po_id' => $poId,
                'plat_nomor' => $plat,
                'merk' => 'Toyota',
                'tipe' => 'Hiace',
                'tahun' => '2022',
                'warna' => 'Putih',
                'kapasitas_kursi' => 12,
                'no_rangka' => 'RANGKA' . rand(1000, 9999),
                'no_mesin' => 'MESIN' . rand(1000, 9999),
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 5. Tambah 4 rute: Palu-Ampana PP, Palu-Luwuk PP
        DB::table('rutes')->insert([
            [
                'po_id' => $poId,
                'lokasi_asal_id' => $lokasiPalu,
                'lokasi_tujuan_id' => $lokasiAmpana,
                'jarak_km' => 350,
                'estimasi_jam' => 9,
                'harga_default' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'po_id' => $poId,
                'lokasi_asal_id' => $lokasiAmpana,
                'lokasi_tujuan_id' => $lokasiPalu,
                'jarak_km' => 350,
                'estimasi_jam' => 9,
                'harga_default' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'po_id' => $poId,
                'lokasi_asal_id' => $lokasiPalu,
                'lokasi_tujuan_id' => $lokasiLuwuk,
                'jarak_km' => 600,
                'estimasi_jam' => 13,
                'harga_default' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'po_id' => $poId,
                'lokasi_asal_id' => $lokasiLuwuk,
                'lokasi_tujuan_id' => $lokasiPalu,
                'jarak_km' => 600,
                'estimasi_jam' => 13,
                'harga_default' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
