<?php

namespace Database\Seeders;

use App\Models\Mobil;
use App\Models\Travel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Panggil PaketSeeder
        $this->call([
            PaketSeeder::class,
            TravelSeeder::class,
            AgenSeeder::class,
            AdminSeeder::class,
            DriverSeeder::class,
            MobilSeeder::class,
            RuteSeeder::class,
            PerjalananSeeder::class,
        ]);
    }
}
