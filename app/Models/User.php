<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Post
 *
 * @mixin Eloquent
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'token',
        'address_id',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function createUser($data, $addressId) : User
    {
        try {
            $token = bin2hex(random_bytes(10));

            $user = self::create([
                'first_name' => $data['first-name-input'],
                'last_name' => $data['last-name-input'],
                'username' => $data['username-input'],
                'email' => $data['email-input'],
                'password' => Hash::make($data['password-input'], [
                    'salt' => env('SALT_STRING'),
                ]),
                'phone' => $data['phone-input'],
                'token' => $token,
                'address_id' => $addressId,
                'role_id' => $data['role-input']
            ]);

            return $user;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public static function activate(string $token)
    {
        $user = self::where('token', $token)->first();

        if (!$user) return;

        $user['email_verified_at'] = now();
        $user->save();
    }

    public static function getUserByUsername(mixed $username)
    {
        return self::where('username', $username)->first();
    }


    public function biography() : HasOne
    {
        return $this->hasOne(Biography::class);
    }

    public function role() : BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function avatar() : HasOne
    {
        return $this->hasOne(Avatar::class);
    }

    public function address() : BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
