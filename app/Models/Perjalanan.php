<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    protected $fillable = [
        'travel_id',
        'mobil_id',
        'driver_id',
        'rute_id',
        'tanggal_berangkat',
        'jam_berangkat',
        'tanggal_tiba',
        'jam_tiba',
        'status'
    ];

    protected static function booted()
    {
        static::updating(function ($perjalanan) {
            // Jika status diubah ke "Tiba"
            if (
                $perjalanan->isDirty('status') &&
                strtolower($perjalanan->status) === 'tiba'
            ) {
                // Hanya update jika tanggal/jam tiba belum ada
                if (is_null($perjalanan->tanggal_tiba)) {
                    $perjalanan->tanggal_tiba = now()->toDateString(); // tanggal hari ini
                }

                if (is_null($perjalanan->jam_tiba)) {
                    $perjalanan->jam_tiba = now()->format('H:i:s'); // jam sekarang
                }
            }
        });
    }


    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function rute()
    {
        return $this->belongsTo(Rute::class);
    }
}
