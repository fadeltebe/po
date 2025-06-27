<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PO extends Model
{
    protected $table = 'pos';
    protected $fillable = [
        'nama',
        'owner_nama',
        'owner_hp',
        'alamat',
        'paket_id',
        'tanggal_aktif',
        'tanggal_berakhir',
        'status', // aktif, non-aktif, expired
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function lokasi()
    {
        return $this->hasMany(Lokasi::class);
    }

    public function mobil()
    {
        return $this->hasMany(Mobil::class);
    }

    public function rute()
    {
        return $this->hasMany(Rute::class);
    }
}
