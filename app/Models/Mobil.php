<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = [
        'travel_id',
        'plat_nomor',
        'merk',
        'tipe',
        'tahun',
        'warna',
        'kapasitas_kursi',
        'no_rangka',
        'no_mesin',
        'status',
    ];

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    public function perjalanan()
    {
        return $this->hasMany(Perjalanan::class);
    }
}
