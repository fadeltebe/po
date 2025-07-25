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
        Schema::create('travels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->string('owner_nama');
            $table->string('owner_hp');
            $table->text('alamat')->nullable();
            $table->foreignId('paket_id')->nullable()->constrained('pakets')->onDelete('set null');
            $table->date('tanggal_aktif');
            $table->date('tanggal_berakhir');
            $table->string('status')->default('aktif'); // aktif, non-aktif, expired
            $table->timestamps();
        });

        Schema::create('travel_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('travel_id');
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop foreign keys first (optional but safe)
        Schema::table('travel_user', function (Blueprint $table) {
            $table->dropForeign(['travel_id']);
            $table->dropForeign(['user_id']);
        });

        // Drop child table first
        Schema::dropIfExists('travel_user');
        Schema::dropIfExists('travels');
    }
};
