<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $travel = DB::table('travels')->first();
        $agens = DB::table('agens')->get();

        foreach ($agens as $agen) {
            $user = User::create([
                'name' => 'Admin ' . $agen->nama,
                'email' => 'admin.' . strtolower($agen->nama) . '@example.com',
                'password' => Hash::make('password'),
            ]);

            DB::table('admins')->insert([
                'user_id' => $user->id,
                'travel_id' => $travel->id,
                'agen_id' => $agen->id,
                'nama' => $user->name,
                'nomor_hp' => '08' . rand(1000000000, 9999999999),
                'alamat' => $agen->alamat,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
