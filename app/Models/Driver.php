<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['po_id', 'nama', 'nomor_hp', 'sim', 'alamat', 'status'];

    public function po()
    {
        return $this->belongsTo(PO::class);
    }

    public function perjalanan()
    {
        return $this->hasMany(Perjalanan::class);
    }
}
