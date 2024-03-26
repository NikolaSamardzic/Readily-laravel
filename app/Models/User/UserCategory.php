<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    use HasFactory;

    protected $table = 'user_category';

    protected $fillable = [
        'category_id',
        'user_id'
    ];
}
