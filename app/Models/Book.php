<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        $book = self::where('id',$bookData['book-id'])->withTrashed()->first();
        $book['name'] = $bookData['book-title-input'];
        $book['page_count'] = $bookData['page-count-input'];
        $book['price'] = $bookData['price-input'];
        $book['description'] = $bookData['book-description-input'];
        $book['release_date'] = $bookData['release-date-input'];
        $book['publisher_id'] = $bookData['publisher-input'];
        $book['image_id'] = $bookData['image_id'];


        $book->save();
    }

    public static function activeBooks($userId)
    {
        return self::whereNull('deleted_at')->where('user_id',$userId)->get();
    }

    public static function deletedBooks($userId)
    {
        return self::where([
            ['user_id','=',$userId],
            ['deleted_at','!=',null]
        ])->withTrashed()->get();
    }
    public static function deleteBook(string $id)
    {
        $book = self::find($id);

        if ($book) {
            $book->delete();
            return $book;
        }

        throw new \Exception('Book doesn\'t exists!',404);
    }

    public static function activateBook(string $id)
    {
        $book = self::where('id',$id)->withTrashed()->first();

        if ($book) {
            $book['deleted_at'] = null;
            $book->save();
            return $book;
        }

        throw new \Exception('Book doesn\'t exists!',404);
    }

    public static function relatedBooksToACategories($relatedCategories)
    {
        $bookIDs = self::select('books.id')->join('book_category as bc','bc.book_id','=','books.id')
            ->join('categories as child','bc.category_id','=','child.id')
            ->join('categories as parent','child.parent_id','=','parent.id')
            ->whereIn('parent.id',$relatedCategories)->groupBy('books.id')->inRandomOrder()->limit(20)->get();

        return self::whereIn('id',$bookIDs)->inRandomOrder()->get();
    }

    public static function relatedToAWriter(mixed $id)
    {
        return self::whereIn('user_id',$id)->inRandomOrder()->limit(20)->get();
    }

    public function reviewStars()
    {
        $review = Review::select(DB::raw('avg(stars) as stars'))->groupBy('book_id')->where('book_id','=',$this['id'])->first();

        if($review)
            return intval($review['stars']);

        return 0;
    }

    public function reviews() : HasMany{
        return $this->hasMany(Review::class);
    }

    public static function getBook($bookId)
    {
        return self::where('id',$bookId)->withTrashed()->first();
    }

    public static function getBestSellingBooks()
    {
        return self::get()->take(20);
    }

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function image() : BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
