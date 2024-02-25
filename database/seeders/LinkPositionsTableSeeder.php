<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkPositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private array $positions = ["header", "footer"];

    public function run(): void
    {
        $now = now();
        foreach ($this->positions as $position) {
            DB::table('link_targets')->insert([
                'name' => $position,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
