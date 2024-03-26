<?php

namespace App\Models\Avatar;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Avatar extends Model
{
    use HasFactory;

    protected $fillable = [
        'src',
        'user_id',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function updateAvatar($user, string $imgName)
    {
        try {
            $user->avatar()->update(['src' => $imgName]);
        }catch (\Exception $e){
            throw $e;
        }
    }

    public static function createAvatar(mixed $id, string $imgName)
    {
        try {
            self::create([
                'src' => $imgName,
                'user_id' => $id,
            ]);
        }catch (\Exception $e){
            throw $e;
        }
    }
}
