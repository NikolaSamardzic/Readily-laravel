<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private array $roles = ["admin", "customer", "writer", "unauthorised"];

    public function run(): void
    {
        $now = now();
        foreach ($this->roles as $role) {
            DB::table('roles')->insert([
                'name' => $role,
                'created_at' => $now,
                'updated_at' => $now
            ]);

        }
    }
}
