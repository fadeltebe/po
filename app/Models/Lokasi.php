<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $fillable = [
        'nama',
        'travel_id',
        'user_id',
    ];

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
