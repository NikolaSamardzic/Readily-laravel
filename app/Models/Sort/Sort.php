<?php

namespace App\Models\Sort;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'created_at',
        'updated_at'
    ];
}

