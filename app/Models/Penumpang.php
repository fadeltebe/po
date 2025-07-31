<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{

    protected $fillable = ['travel_id', 'nama', 'nik', 'no_hp', 'alamat', 'is_langganan'];

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    public function tikets()
    {
        return $this->hasMany(Tiket::class);
    }
}
