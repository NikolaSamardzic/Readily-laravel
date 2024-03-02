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
            'first_name' => 'Test',
            'last_name' => 'Test',
            'username' => 'Test123',
            'address_id' => null,
            'role_id' => 2,
        ],
        [
            'first_name' => 'Stephen',
            'last_name' => 'King',
            'username' => 'StephenKing',
            'address_id' => 1,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Theodor',
            'last_name' => 'Seuss',
            'username' => 'TheodorSeuss',
            'address_id' => 2,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Roald',
            'last_name' => 'Dahl',
            'username' => 'RoaldDahl',
            'address_id' => 3,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Nicholas',
            'last_name' => 'Sparks',
            'username' => 'NicholasSparks',
            'address_id' => 4,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Nora',
            'last_name' => 'Roberts',
            'username' => 'NoraRoberts',
            'address_id' => 5,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Doris Kearns Goodwin',
            'last_name' => 'Goodwin',
            'username' => 'DorisGoodwin',
            'address_id' => 6,
            'role_id' => 3,
        ],
        [
            'first_name' => 'David',
            'last_name' => 'Cullough',
            'username' => 'DavidCullough',
            'address_id' => 7,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Joanne',
            'last_name' => 'Rowling',
            'username' => 'JoanneRowling',
            'address_id' => 8,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Walter',
            'last_name' => 'Isaacson',
            'username' => 'WalterIsaacson',
            'address_id' => 9,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Steven',
            'last_name' => 'Levy',
            'username' => 'StevenLevy',
            'address_id' => 10,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Jamie',
            'last_name' => 'Oliver',
            'username' => 'JamieOliver',
            'address_id' => 11,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Julia',
            'last_name' => 'Child',
            'username' => 'JuliaChild',
            'address_id' => 12,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Tony',
            'last_name' => 'Robbins',
            'username' => 'TonyRobbins',
            'address_id' => 13,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Dale',
            'last_name' => 'Carnegie',
            'username' => 'DaleCarnegie',
            'address_id' => 14,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Paul',
            'last_name' => 'Theroux',
            'username' => 'PaulTheroux',
            'address_id' => 15,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Bill',
            'last_name' => 'Bryson',
            'username' => 'BillBryson',
            'address_id' => 16,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Sir Arthur Conan',
            'last_name' => 'Doyle',
            'username' => 'SirArthur',
            'address_id' => 17,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Agatha',
            'last_name' => 'Christie',
            'username' => 'AgathaChristie',
            'address_id' => 18,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Michael',
            'last_name' => 'Lewis',
            'username' => 'MichaelLewis',
            'address_id' => 19,
            'role_id' => 3,
        ],
        [
            'first_name' => 'Malcolm',
            'last_name' => 'Gladwell',
            'username' => 'MalcolmGladwell',
            'address_id' => 20,
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
