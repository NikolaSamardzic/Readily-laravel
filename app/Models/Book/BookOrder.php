<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class BookOrder extends Model
{
    use HasFactory;

    protected $table = 'book_order';

    protected $fillable = [
        'quantity',
        'unit_price',
        'book_id',
        'order_id',
        'created_at',
        'updated_at'
    ];

    public static function insertBooksIntoCart($orderId, array $booksToInsert)
    {
        $now = now();
        foreach ($booksToInsert as $book){
             self::create([
                'quantity' => $book['quantity'],
                'unit_price' => $book['book']['price'],
                'book_id' => $book['book']['id'],
                'order_id' => $orderId,
                'updated_at' => $now
            ]);
        }
    }

    public static function updateBooksInsideCart(mixed $orderId, array $booksToUpdate)
    {
        $now = now();
        foreach ($booksToUpdate as $book){
            $orderBook = self::where([
                ['order_id','=',$orderId],
                ['book_id','=',$book['book']['id']]
            ])->first();

            $orderBook['quantity'] = $book['quantity'];
            $orderBook['updated_at'] = $now;
            $orderBook->save();
        }
    }

    public static function getTotalAmount(mixed $id)
    {
        return self::select(DB::raw('sum(quantity * unit_price) as total'))->where('order_id','=',$id)->first()['total'];
    }

    public static function deleteBookOrder($unfinishedOrder, array $itemsToDelete)
    {
        $rows = self::where('order_id','=',$unfinishedOrder['id'])->whereIn('book_id',$itemsToDelete)->get();
        $rows = iterator_to_array($rows);
        $rows = array_column($rows, "id");
        self::destroy($rows);

    }

    public function book() : BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
