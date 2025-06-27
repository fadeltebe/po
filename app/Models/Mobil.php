<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = [
        'po_id',
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

    public function po()
    {
        return $this->belongsTo(Po::class);
    }

    public function perjalanan()
    {
        return $this->hasMany(Perjalanan::class);
    }
}
