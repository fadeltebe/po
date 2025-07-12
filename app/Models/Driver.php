<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['travel_id', 'nama', 'nomor_hp', 'sim', 'alamat', 'status'];

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    public function perjalanan()
    {
        return $this->hasMany(Perjalanan::class);
    }
}
