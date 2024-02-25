<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private $linkRoles = [
        [1,1],
        [1,2],
        [1,3],
        [1,6],
        [1,7],
        [1,8],
        [1,9],
        [1,10],
        [1,11],
        [1,12],
        [1,13],
        [1,14],
        [1,15],
        [2,2],
        [2,3],
        [2,6],
        [2,7],
        [2,8],
        [2,9],
        [2,10],
        [2,11],
        [2,12],
        [2,13],
        [2,14],
        [2,15],
        [3,2],
        [3,3],
        [3,6],
        [3,7],
        [3,8],
        [3,9],
        [3,10],
        [3,11],
        [3,12],
        [3,13],
        [3,14],
        [3,15],
        [4,2],
        [4,4],
        [4,5],
        [4,7],
        [4,8],
        [4,9],
        [4,10],
        [4,11],
        [4,12],
        [4,13],
        [4,14],
        [4,15],
    ];

    public function run(): void
    {
        $now = now();
        foreach ($this->linkRoles as $linkRole) {
            DB::table('link_role')->insert([
                'role_id' => $linkRole[0],
                'link_id' => $linkRole[1],
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
