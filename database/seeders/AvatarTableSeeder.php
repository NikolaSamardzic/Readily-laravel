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
        ['src' => '6.jpg', 'user_id' => 1],
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
