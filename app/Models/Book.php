<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'page_count',
        'price',
        'release_date',
        'publisher_id',
        'user_id',
        'image_id',
        'description',
    ];

    public static function insertBook($data){
        return self::create([
            'name' => $data['book-title-input'],
            'page_count' => $data['page-count-input'],
            'price' => $data['price-input'],
            'description' => $data['book-description-input'],
            'release_date' => $data['release-date-input'],
            'user_id' => $data['writer-id'],
            'publisher_id' => $data['publisher-input'],
            'image_id' => $data['image_id'],
        ]);
    }

    public static function updateBook(array $bookData)
    {
        $book = self::find($bookData['book-id']);
        $book['name'] = $bookData['book-title-input'];
        $book['page_count'] = $bookData['page-count-input'];
        $book['price'] = $bookData['price-input'];
        $book['description'] = $bookData['book-description-input'];
        $book['release_date'] = $bookData['release-date-input'];
        $book['publisher_id'] = $bookData['publisher-input'];
        $book['image_id'] = $bookData['image_id'];


        $book->save();
    }

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function image() : BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
