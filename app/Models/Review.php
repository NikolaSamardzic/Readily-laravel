<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'stars',
        'user_id',
        'book_id'
    ];

    public static function getReviewForBookAndUser(mixed $bookId, mixed $getAuthIdentifier)
    {
        $review = self::where([
            ['book_id','=',$bookId],
            ['user_id','=',$getAuthIdentifier]
        ])->first();

        return $review ? $review['id'] : 0;
    }

    public static function insertReview($stars, $bookId, $userId)
    {
        return self::create([
            'stars' => $stars,
            'book_id' => $bookId,
            'user_id' => $userId
        ]);
    }

    public static function updateReview($id, $stars)
    {
        $review = self::find($id);

        $review['stars'] = $stars;
        $review->save();
    }
}
