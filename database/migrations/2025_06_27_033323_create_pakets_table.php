<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // gold, silver, trial, dll
            $table->integer('max_armada')->default(0);
            $table->integer('max_lokasi')->default(0);
            $table->integer('harga_per_bulan')->nullable(); // untuk non-trial
            $table->integer('durasi_hari')->default(30); // lama paket aktif (misal 7 hari untuk trial, 30 hari untuk lainnya)
            $table->boolean('is_trial')->default(false); // true jika ini paket trial
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};
