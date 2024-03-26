<?php

namespace App\Models\Publisher;

use App\Models\Book\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public static function getAllActivePublishers()
    {
        return self::where('deleted_at',null)
                    ->get();
    }

    public static function getAllActive()
    {
        return self::query()->whereNull('deleted_at')->get();
    }

    public static function getAllDeleted()
    {
        return self::query()->whereNotNull('deleted_at')->withTrashed()->get();
    }

    public static function deletePublisherWithId(string $id)
    {
        $publisher = Publisher::query()->find($id);
        $publisher->delete();
    }

    public static function activatePublisherWithId($id)
    {
        $publisher = Publisher::query()->where('id','=',$id)->withTrashed()->first();
        $publisher['deleted_at'] = null;
        $publisher->save();
    }

    public static function storePublisherType(mixed $name)
    {
        self::query()->create([
            'name' => $name
        ])->save();
    }

    public static function getPublisherWithId(string $id)
    {
        return self::query()->where('id','=',$id)->withTrashed()->first();
    }

    public static function updatePublisher(string $id, mixed $input)
    {
        $publisher = self::query()->where('id','=',$id)->withTrashed()->first();
        $publisher['name'] = $input;
        $publisher->save();
    }

    public function books(){
        return $this->hasMany(Book::class);
    }
}
