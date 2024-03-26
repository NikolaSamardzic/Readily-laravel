<?php

namespace Database\Seeders;

use App\Models\Delivery\DeliveryType;
use Illuminate\Database\Seeder;

class DeliveryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $deliveryTypes = ['Standard', 'Express', 'Next Day', 'Same Day'];

    public function run(): void
    {
        $now = now();
        foreach ($this->deliveryTypes as $deliveryType){
            DeliveryType::create([
                'name' => $deliveryType,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
