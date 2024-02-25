<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

//'first_name',
//'last_name',
//'username',
//'email',
//'password',
//'phone',
//'token',
//'address_id',
//'role_id',

    private $users = [
        [
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'username' => 'Admin',
            'address_id' => null,
            'role_id' => 1,
        ],
        [
            'first_name' => 'Customer',
            'last_name' => 'Customer',
            'username' => 'Customer',
            'address_id' => null,
            'role_id' => 2,
        ],
        [
            'first_name' => 'Writer',
            'last_name' => 'Writer',
            'username' => 'Writer',
            'address_id' => null,
            'role_id' => 3,
        ],
    ];

    public function run(): void
    {
        $now = now();
        foreach ($this->users as $user) {
            DB::table('users')->insert([
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'username' => $user['username'],
                'email' => 'fake@gmail.com',
                'password' => Hash::make('Sifra.123', [
                    'salt' => env('SALT_STRING'),
                ]),
                'phone' => '0612191029',
                'token' => bin2hex(random_bytes(10)),
                'address_id' => $user['address_id'],
                'role_id' => $user['role_id'],
                'email_verified_at' => $now,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
