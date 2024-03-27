<?php

namespace App\Models\Role;

use App\Models\Link\Link;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }

    public function links() : BelongsToMany
    {
        return $this->belongsToMany(Link::class);
    }
}