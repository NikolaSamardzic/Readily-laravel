<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private array $types = ["link", "social media", "document"];

    public function run(): void
    {
        $now = now();
        foreach ($this->types as $type) {
            DB::table('link_types')->insert([
                'name' => $type,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
