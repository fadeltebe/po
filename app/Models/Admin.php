<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'user_id',
        'travel_id',
        'agen_id',
        'nama',
        'nik',
        'nomor_hp',
        'alamat',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    public function agen()
    {
        return $this->belongsTo(Agen::class);
    }
}
