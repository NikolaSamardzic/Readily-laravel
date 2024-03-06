<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $orderStatuses = ['Pending', 'Processing', 'Shipped', 'Delivered'];

    public function run(): void
    {
        $now = now();
        foreach ($this->orderStatuses as $status){
            OrderStatus::create([
               'name' => $status,
               'created_at' => $now,
               'updated_at' => $now
            ]);
        }
    }
}
