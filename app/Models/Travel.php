<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Travel extends Model
{
    protected $table = 'travels';
    protected $fillable = [
        'name',
        'slug',
        'owner_nama',
        'owner_hp',
        'alamat',
        'paket_id',
        'tanggal_aktif',
        'tanggal_berakhir',
        'status', // aktif, non-aktif, expired
    ];

    protected static function booted()
    {
        static::creating(function ($travel) {
            // Generate the slug from the name
            if (empty($travel->slug)) {
                $slug = Str::slug($travel->name);

                // Ensure the slug is unique
                $count = Travel::whereRaw('slug LIKE ?', [$slug . '%'])->count();

                if ($count > 0) {
                    // If slug already exists, append a number to it
                    $slug = $slug . '-' . ($count + 1);
                }

                $travel->slug = $slug;
            }
        });
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function lokasi()
    {
        return $this->hasMany(Lokasi::class);
    }

    public function mobil()
    {
        return $this->hasMany(Mobil::class);
    }

    public function rute()
    {
        return $this->hasMany(Rute::class);
    }
}
