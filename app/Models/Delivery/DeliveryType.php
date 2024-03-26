<?php

namespace App\Models\Delivery;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'name'
    ];

    public static function getAllActive()
    {
        return self::query()->whereNull('deleted_at')->get();
    }

    public static function getAllDeleted()
    {
        return self::query()->whereNotNull('deleted_at')->withTrashed()->get();
    }

    public static function deleteDeliveryWithId(string $id)
    {
        $delivery = DeliveryType::query()->find($id);
        $delivery->delete();
    }

    public static function activateDeliveryWithId($id)
    {
        $delivery = DeliveryType::query()->where('id','=',$id)->withTrashed()->first();
        $delivery['deleted_at'] = null;
        $delivery->save();
    }

    public static function storeDeliveryType($name)
    {
        self::query()->create([
            'name' => $name
        ])->save();
    }

    public static function getDeliveryTypeWithId(string $id)
    {
        return self::query()->where('id','=',$id)->withTrashed()->first();
    }

    public static function updateDelivery(string $id, mixed $input)
    {
        $delivery = self::query()->where('id','=',$id)->withTrashed()->first();
        $delivery['name'] = $input;
        $delivery->save();
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
