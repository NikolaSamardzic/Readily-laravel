<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'book_id'
    ];

    public static function insertComment(mixed $input, mixed $getAuthIdentifier, $bookId)
    {

        return self::create([
            'text' => $input,
            'user_id' => $getAuthIdentifier,
            'book_id' => $bookId
        ]);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function commentImages(){
        return $this->hasMany(CommentImage::class);
    }
}
