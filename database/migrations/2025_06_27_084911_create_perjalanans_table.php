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
        Schema::create('perjalanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('travel_id')->constrained('travels')->onDelete('cascade');
            $table->foreignId('mobil_id')->constrained('mobils')->onDelete('cascade');
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade');
            $table->foreignId('rute_id')->constrained('rutes')->onDelete('cascade');
            $table->date('tanggal_berangkat');
            $table->time('jam_berangkat');
            $table->date('tanggal_tiba')->nullable();  // ✅ ditambahkan
            $table->time('jam_tiba')->nullable();      // ✅ ditambahkan
            $table->enum('status', ['Dijadwalkan', 'Berangkat', 'Tiba', 'Dibatalkan'])->default('dijadwalkan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perjalanans');
    }
};
