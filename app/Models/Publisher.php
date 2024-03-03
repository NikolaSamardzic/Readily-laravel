<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Publisher extends Model
{
    use HasFactory;

    public static function getAllActivePublishers()
    {
        return self::where('deleted_at',null)
                    ->get();
    }
}
