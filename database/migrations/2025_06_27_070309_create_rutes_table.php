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
        Schema::create('rutes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('travel_id')->constrained('travels')->onDelete('cascade');
            $table->foreignId('lokasi_asal_id')->constrained('lokasis')->onDelete('cascade');
            $table->foreignId('lokasi_tujuan_id')->constrained('lokasis')->onDelete('cascade');
            $table->integer('jarak_km')->nullable();
            $table->float('estimasi_jam')->nullable();
            $table->integer('harga_default')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutes');
    }
};
