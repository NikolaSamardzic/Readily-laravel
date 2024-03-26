<?php

namespace App\Models\Order;

use App\Models\Book\BookOrder;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable= [
        'total_price',
        'user_id',
        'order_status_id',
        'address_id',
        'delivery_type_id'
    ];

    public static function createOrderForAUser($user)
    {
        $now = now();
        return self::create([
            'user_id' => $user['id'],
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }

    public static function allFinishedOrders()
    {
        return self::query()->whereNotNull('finished_at')->get();
    }

    public function updateOrder($totalAmount,$addressId,$deliveryTypeId)
    {
        $now = now();
        $this['total_price'] = $totalAmount;
        $this['address_id'] = $addressId;
        $this['delivery_type_id'] = $deliveryTypeId;
        $this['order_status_id'] = 1;
        $this['finished_at'] = $now;
        $this->save();
    }

    public function orderBooks()
    {
        $books = BookOrder::where('order_id','=',$this['id'])->get();

        return $books->isEmpty() ? [] : $books;
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderStatus(){
        return $this->belongsTo(OrderStatus::class);
    }

    public function bookOrders() : HasMany
    {
        return $this->hasMany(BookOrder::class);
    }
}
