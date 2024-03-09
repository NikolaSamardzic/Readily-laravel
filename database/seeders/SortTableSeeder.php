<?php

namespace Database\Seeders;

use App\Models\Sort;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SortTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $sortOptions = [
        ['name' => 'Most Popular','value' => 'popular'],
        ['name' => 'Newest','value' => 'newest'],
        ['name' => 'Price Asc','value' => 'price-asc'],
        ['name' => 'Price Desc','value' => 'price-desc'],
        ['name' => 'Name A-Z','value' => 'name-asc'],
        ['name' => 'Name Z-A','value' => 'name-desc'],
    ];

    public function run(): void
    {
        foreach ($this->sortOptions as $option){
            Sort::create([
                'name' => $option['name'],
                'value' => $option['value']
            ]);
        }
    }
}
