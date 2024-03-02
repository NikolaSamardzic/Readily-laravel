<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvatarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private $avatars = [
        ['src' => '5.jpg', 'user_id' => 4],
        ['src' => '23.jpg', 'user_id' => 5],
        ['src' => '24.jpg', 'user_id' => 6],
        ['src' => '31.jpg', 'user_id' => 7],
        ['src' => '25.jpg', 'user_id' => 8],
        ['src' => '26.jpg', 'user_id' => 9],
        ['src' => '27.jpg', 'user_id' => 10],
        ['src' => '6.jpg', 'user_id' => 11],
        ['src' => '30.jpg', 'user_id' => 12],
        ['src' => '20.jpg', 'user_id' => 13],
        ['src' => '19.jpg', 'user_id' => 14],
        ['src' => '18.jpg', 'user_id' => 15],
        ['src' => '17.jpg', 'user_id' => 16],
        ['src' => '15.jpg', 'user_id' => 17],
        ['src' => '16.jpg', 'user_id' => 18],
        ['src' => '14.jpg', 'user_id' => 19],
        ['src' => '12.jpg', 'user_id' => 20],
        ['src' => '13.jpg', 'user_id' => 21],
        ['src' => '29.jpg', 'user_id' => 22],
        ['src' => '28.jpg', 'user_id' => 23],
    ];

    public function run(): void
    {
        $now = now();
        foreach ($this->avatars as $avatar) {
            DB::table('avatars')->insert([
                'src' => $avatar['src'],
                'user_id' => $avatar['user_id'],
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
