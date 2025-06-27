<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $fillable = [
        'nama',
        'po_id',
        'user_id',
    ];

    public function po()
    {
        return $this->belongsTo(Po::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
