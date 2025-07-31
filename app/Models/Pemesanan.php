<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{

    protected $fillable = ['travel_id', 'perjalanan_id', 'user_id', 'nama_pemesan', 'no_hp_pemesan', 'status', 'total_harga', 'catatan'];

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    public function perjalanan()
    {
        return $this->belongsTo(Perjalanan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tikets()
    {
        return $this->hasMany(Tiket::class);
    }
}
