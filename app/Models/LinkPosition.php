<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LinkPosition extends Model
{
    use HasFactory;

    public function links() : BelongsToMany
    {
        return $this->belongsToMany(Link::class);
    }
}
