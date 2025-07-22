<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    protected $fillable = [
        'nama',
        'travel_id',
        'alamat',
        'nomor_hp',
        'status'
    ];

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Admin::class, 'agen_id', 'id', 'id', 'user_id');
    }
}
