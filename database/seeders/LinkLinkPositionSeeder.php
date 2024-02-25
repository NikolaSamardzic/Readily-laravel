<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkLinkPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private array $linkPositions = [
        [1,1], [1,2],[1,3], [1,4], [1,5], [1,6], [1,7], [2,1], [2,2], [2,3], [2,4], [2,5], [2,6], [2,7], [2,8], [2,9], [2,10], [2,11], [2,12], [2,13], [2,14], [2,15],
    ];

    public function run(): void
    {
        $now = now();
        foreach ($this->linkPositions as $linkPosition) {
            DB::table('link_link_position')->insert([
                'link_position_id' => $linkPosition[0],
                'link_id' => $linkPosition[1],
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
