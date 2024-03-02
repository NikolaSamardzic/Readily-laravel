<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private array $publishers = [
        "Pottermore Publishing",
        "Scribner",
        "William Morrow Paperbacks",
        "Grapevine",
        "Mariner Books",
        "Simon And Schuster",
        "Knopf",
        "Flatiron Books",
        "Oreilly Media",
        "Random House Books For Young Readers",
        "Viking Books For Young Readers",
        "Random House",
        "Martins Press",
        "Little Brown And Company",
        "Norton And Company",
    ];


    public function run(): void
    {
        $now = now();
        foreach ($this->publishers as $publisher) {
            DB::table('publishers')->insert([
                'name' => $publisher,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
