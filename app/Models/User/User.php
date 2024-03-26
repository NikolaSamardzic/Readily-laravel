<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Address\Address;
use App\Models\Avatar\Avatar;
use App\Models\Biography\Biography;
use App\Models\Book\Book;
use App\Models\Order\Order;
use App\Models\Review\Review;
use App\Models\Role\Role;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * Post
 *
 * @mixin Eloquent
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

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

    public function userReview($bookId){
        return Review::where([
            ['user_id','=',$this['id']],
            ['book_id','=',$bookId]
        ])->first();
    }

    public function categories(){
        return $this->hasMany(UserCategory::class);
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

    public function books() : HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }

    public static function updateUser($data, $addressId, $user)
    {
        try {

            $user['first_name'] = $data['first-name-input'];
            $user['last_name'] = $data['last-name-input'];
            $user['username'] = $data['username-input'];
            $user['email'] = $data['email-input'];
            $user['phone'] = $data['phone-input'];

            $user->save();

            return $user;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public static function getActiveUsers()
    {
        return self::query()->where('is_banned','=',0)->whereNotNull('email_verified_at')->get();
    }

    public static function getDeletedUsers()
    {
        return self::query()->whereNotNull('deleted_at')->whereNotNull('email_verified_at')->withTrashed()->get();
    }

    public static function getBannedUsers()
    {
        return self::query()->whereNull('deleted_at')->whereNotNull('email_verified_at')->where('is_banned','=',1)->get();
    }

    public static function getUser($id)
    {
        return self::query()->withTrashed()->find($id);
    }

    public static function deleteUser(mixed $id)
    {
        $user = self::find($id);

        if ($user) {
            $user->delete();
            return $user;
        }

        throw new \Exception('User doesn\'t exists!',404);
    }

    public static function activateUser($id)
    {
        $user = self::query()->withTrashed()->find($id);
        $user['deleted_at'] = null;
        $user->save();
        return $user;
    }

    public static function banUser($id)
    {
        $user = self::query()->withTrashed()->find($id);
        $user['is_banned'] = 1;
        $user->save();
        return $user;
    }

    public static function unbanUser($id)
    {
        $user = self::query()->withTrashed()->find($id);
        $user['is_banned'] = 0;
        $user->save();
        return $user;
    }



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
        return self::where('username', $username)
            ->whereNotNull('email_verified_at')
            ->first();
    }

    public static function getAllWriters()
    {
        return self::where('role_id',3)->get();
    }

    public function unfinishedOrder()
    {
        return $this->orders()->whereNull('finished_at')->first();
    }

}
