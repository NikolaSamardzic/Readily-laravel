<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoggedUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];


    public static function logUser($userId)
    {
        self::query()->create([
            'user_id' => $userId
        ])->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
