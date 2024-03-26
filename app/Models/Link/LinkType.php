<?php

namespace App\Models\Link;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LinkType extends Model
{
    use HasFactory;

    public function links() : HasMany
    {
        return $this->hasMany(Link::class);
    }
}
