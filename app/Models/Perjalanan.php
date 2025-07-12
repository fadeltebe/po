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
