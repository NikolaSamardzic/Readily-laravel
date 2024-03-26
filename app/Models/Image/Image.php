<?php

namespace App\Models\Image;

use App\Models\Book\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public static function updateImage(mixed $id, string $imageName)
    {
        $image = self::find($id);
        $image['src'] = $imageName;
        $image->save();
        return $image;
    }

    public function image() : HasOne
    {
        return $this->hasOne(Book::class);
    }
}
