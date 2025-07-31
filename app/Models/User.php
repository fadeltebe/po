<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\HasTenants;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, HasTenants
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function travels()
    {
        return $this->belongsToMany(Travel::class, 'travel_user', 'user_id', 'travel_id');
    }

    public function getTenants(Panel $panel): Collection
    {
        return $this->travels;
    }

    public function canAccessTenant(Model $tenant): bool
    {
        return $this->travels()->whereKey($tenant)->exists();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // if ($panel->getId() === 'superadmin') {
        //     return is_superadmin();
        // } elseif ($panel->getId() === 'admin') {
        //     return true; // Admin atau Owner bisa akses panel admin
        // }
        return true;
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function isAdminAgen(): bool
    {
        return $this->hasRole('Admin Agen') && $this->admin?->agen_id;
    }
}
