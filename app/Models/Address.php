<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

/**
 * Post
 *
 * @mixin Eloquent
 * @mixin Builder
 */
class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_name',
        'address_number',
        'city',
        'state',
        'zip_code',
        'country'
    ];

    public static function insertAddress($addressName, $addressNumber, $city, $state, $zipCode, $country) : Address
    {
        try {
            return self::firstOrCreate([
                'address_name' => $addressName,
                'address_number' => $addressNumber,
                'city' => $city,
                'state' => $state,
                'zip_code' => $zipCode,
                'country' => $country,
            ]);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }
}
