<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;

    protected $table = 'book_category';

    protected $fillable = [
        'book_id',
        'category_id',
    ];

    public static function insertBookCategories($bookId, $categories){
        foreach ($categories as $category){
            self::create([
                'book_id' => $bookId,
                'category_id' => $category
            ]);
        }
    }

    public static function deleteBookCategories($bookId, $categories)
    {
        self::where('book_id', $bookId)->whereIn('category_id', $categories)->delete();
    }
}
