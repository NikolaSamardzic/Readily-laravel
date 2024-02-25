<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $links = [
        ['name'=>'Admin', 'href'=>'admin', 'appearance_order'=>1, 'link_target_id' =>1, 'link_type_id'=>1],
        ['name'=>'Home', 'href'=>'admin', 'appearance_order'=>2, 'link_target_id' =>1, 'link_type_id'=>1],
        ['name'=>'Shop', 'href'=>'admin', 'appearance_order'=>3, 'link_target_id' =>1, 'link_type_id'=>1],
        ['name'=>'Checkout', 'href'=>'admin', 'appearance_order'=>4, 'link_target_id' =>1, 'link_type_id'=>1],
        ['name'=>'Sign up', 'href'=>'admin', 'appearance_order'=>5, 'link_target_id' =>1, 'link_type_id'=>1],
        ['name'=>'Log out', 'href'=>'admin', 'appearance_order'=>6, 'link_target_id' =>1, 'link_type_id'=>1],
        ['name'=>'Log in', 'href'=>'admin', 'appearance_order'=>7, 'link_target_id' =>1, 'link_type_id'=>1],
        ['name'=>'Author', 'href'=>'admin', 'appearance_order'=>8, 'link_target_id' =>1, 'link_type_id'=>3],
        ['name'=>'Documentation', 'href'=>'admin', 'appearance_order'=>9, 'link_target_id' =>2, 'link_type_id'=>3],
        ['name'=>'Github', 'href'=>'admin', 'appearance_order'=>10, 'link_target_id' =>2, 'link_type_id'=>3],
        ['name'=>'RSS', 'href'=>'admin', 'appearance_order'=>11, 'link_target_id' =>2, 'link_type_id'=>3],
        ['name'=>'Sitemap', 'href'=>'admin', 'appearance_order'=>12, 'link_target_id' =>2, 'link_type_id'=>3],
        ['name'=>'Facebook', 'href'=>'admin', 'appearance_order'=>13, 'link_target_id' =>2, 'link_type_id'=>2],
        ['name'=>'Instagram', 'href'=>'admin', 'appearance_order'=>14, 'link_target_id' =>2, 'link_type_id'=>2],
        ['name'=>'Twitter', 'href'=>'admin', 'appearance_order'=>15, 'link_target_id' =>2, 'link_type_id'=>2],
    ];

    public function run(): void
    {
        $now = now();
        foreach ($this->links as $link) {
            DB::table('link_targets')->insert([
                'name' => $link['name'],
                'href' => $link['href'],
                'appearance_order' => $link['appearance_order'],
                'link_target_id' => $link['link_target_id'],
                'link_type_id' => $link['link_type_id'],
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
