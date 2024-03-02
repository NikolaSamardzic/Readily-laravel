<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $categories = [
        [
            'name' => 'Mystery',
            'parent_id' => null
        ],
        [
            'name' => 'Fiction',
            'parent_id' => null
        ],
        [
            'name' => 'Business And Economics',
            'parent_id' => null
        ],
        [
            'name' => 'History',
            'parent_id' => null
        ],
        [
            'name' => 'Romance',
            'parent_id' => null
        ],
        [
            'name' => 'Children\'s Books',
            'parent_id' => null
        ],
        [
            'name' => 'Technology And Science',
            'parent_id' => null
        ],
        [
            'name' => 'Cooking',
            'parent_id' => null
        ],
        [
            'name' => 'Self Improvement',
            'parent_id' => null
        ],
        [
            'name' => 'Travel',
            'parent_id' => null
        ],
        [
            'name' => 'Cultural Travel',
            'parent_id' => 10
        ],
        [
            'name' => 'Adventure Travel',
            'parent_id' => 10
        ],
        [
            'name' => 'Personal Development',
            'parent_id' => 9
        ],
        [
            'name' => 'Communication Skills',
            'parent_id' => 9
        ],
        [
            'name' => 'Healthy Cooking',
            'parent_id' => 8
        ],
        [
            'name' => 'Ethnic Cuisines',
            'parent_id' => 8
        ],
        [
            'name' => 'Computer Programming',
            'parent_id' => 7
        ],
        [
            'name' => 'Cybersecurity And Hacking',
            'parent_id' => 7
        ],
        [
            'name' => 'Young Adult Fiction',
            'parent_id' => 6
        ],
        [
            'name' => 'Humorous Stories',
            'parent_id' => 6
        ],
        [
            'name' => 'Historical Romance',
            'parent_id' => 5
        ],
        [
            'name' => 'Fantasy Romance',
            'parent_id' => 5
        ],
        [
            'name' => 'Cultural History',
            'parent_id' => 4
        ],
        [
            'name' => 'Social History',
            'parent_id' => 4
        ],
        [
            'name' => 'Management And Leadership',
            'parent_id' => 3
        ],
        [
            'name' => 'Finance And Accounting',
            'parent_id' => 3
        ],
        [
            'name' => 'Horror Fiction',
            'parent_id' => 2
        ],
        [
            'name' => 'Fantasy Fiction',
            'parent_id' => 2
        ],
        [
            'name' => 'Detective Fiction',
            'parent_id' => 1
        ],
        [
            'name' => 'Thrillers',
            'parent_id' => 1
        ],
    ];
    public function run(): void
    {
        $now = now();
        foreach ($this->categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'parent_id' => $category['parent_id'],
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
