<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    protected $fillable = [
        'po_id',
        'mobil_id',
        'driver_id',
        'rute_id',
        'tanggal_berangkat',
        'jam_berangkat',
        'status'
    ];

    public function po()
    {
        return $this->belongsTo(PO::class);
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
