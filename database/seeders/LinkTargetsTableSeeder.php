<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkTargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private array $targets = ["_self", "blank"];


    public function run(): void
    {
        $now = now();
        foreach ($this->targets as $target) {
            DB::table('link_targets')->insert([
                'name' => $target,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
