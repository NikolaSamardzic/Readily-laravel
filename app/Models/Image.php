<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'src',
        'alt',
    ];

    public static function createImage(string $imageName, string $bookTitle)
    {
        return self::create([
            'src' => $imageName,
            'alt' => $bookTitle . ' image'
        ]);
    }
}
