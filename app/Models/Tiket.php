<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{

    protected $fillable = ['travel_id', 'pemesanan_id', 'penumpang_id', 'kursi_nomor', 'harga', 'status', 'catatan'];

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function penumpang()
    {
        return $this->belongsTo(Penumpang::class);
    }
}
