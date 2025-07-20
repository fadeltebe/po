<?php

namespace App\Models;

use App\Models\Travel;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends SpatieRole
{
    public function travel(): BelongsTo
    {
        return $this->belongsTo(Travel::class);
    }
}
