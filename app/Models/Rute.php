<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    protected $fillable = [
        'po_id',
        'lokasi_asal_id',
        'lokasi_tujuan_id',
        'jarak_km',
        'estimasi_jam',
        'harga_default',
    ];

    public function po()
    {
        return $this->belongsTo(PO::class);
    }

    public function lokasiAsal()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_asal_id');
    }

    public function lokasiTujuan()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_tujuan_id');
    }

    public function perjalanan()
    {
        return $this->hasMany(Perjalanan::class);
    }
}
