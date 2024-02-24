<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Biography extends Model
{
    use HasFactory;

    protected $fillable = [
        'biography_text',
        'user_id',
    ];

    public static function createBiography(mixed $id, string $biographyText)
    {
        try {
            self::create([
                'biography_text' => $biographyText,
                'user_id' => $id,
            ]);
        }catch (\Exception $e){
            throw $e;
        }
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
