<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = [
        'nama',
        'max_armada',
        'max_lokasi',
        'harga_per_bulan',
    ];
}
