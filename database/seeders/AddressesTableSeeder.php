<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $addresses = [
        [
            'address_name' => 'Sunset Villa',
            'address_number' => '123',
            'city' => 'Los Angeles',
            'state' => 'California',
            'zip_code' => '90001',
            'country' => 'United States'
        ],
        [
            'address_name' => 'Green Meadows',
            'address_number' => '456',
            'city' => 'New York City',
            'state' => 'New York',
            'zip_code' => '10001',
            'country' => 'United States'
        ],
        [
            'address_name' => 'Ocean View Apartments',
            'address_number' => '789',
            'city' => 'Miami',
            'state' => 'Florida',
            'zip_code' => '33101',
            'country' => 'United States'
        ],
        [
            'address_name' => 'Mountain Breeze Estate',
            'address_number' => '101',
            'city' => 'Denver',
            'state' => 'Colorado',
            'zip_code' => '80202',
            'country' => 'United States'
        ],
        [
            'address_name' => 'Golden Gate Residences',
            'address_number' => '246',
            'city' => 'San Francisco',
            'state' => 'California',
            'zip_code' => '94102',
            'country' => 'United States'
        ],
        [
            'address_name' => 'Emerald Heights',
            'address_number' => '369',
            'city' => 'Seattle',
            'state' => 'Washington',
            'zip_code' => '98101',
            'country' => 'United States'
        ],
        [
            'address_name' => 'Maple Grove',
            'address_number' => '555',
            'city' => 'Toronto',
            'state' => 'Ontario',
            'zip_code' => 'M5V 2X4',
            'country' => 'Canada'
        ],
        [
            'address_name' => 'Riverfront Residences',
            'address_number' => '777',
            'city' => 'Vancouver',
            'state' => 'British Columbia',
            'zip_code' => 'V6B 4Y8',
            'country' => 'Canada'
        ],
        [
            'address_name' => 'Cherry Blossom Lane',
            'address_number' => '888',
            'city' => 'Tokyo',
            'state' => 'Tokyo',
            'zip_code' => '103-0011',
            'country' => 'Japan'
        ],
        [
            'address_name' => 'Roppongi Hills',
            'address_number' => '999',
            'city' => 'Minato City',
            'state' => 'Tokyo',
            'zip_code' => '106-6108',
            'country' => 'Japan'
        ],
        [
            'address_name' => 'Sydney Harbour View',
            'address_number' => '111',
            'city' => 'Sydney',
            'state' => 'New South Wales',
            'zip_code' => '2000',
            'country' => 'Australia'
        ],
        [
            'address_name' => 'Melbourne Central',
            'address_number' => '222',
            'city' => 'Melbourne',
            'state' => 'Victoria',
            'zip_code' => '3000',
            'country' => 'Australia'
        ],
        [
            'address_name' => 'Lion City Apartments',
            'address_number' => '333',
            'city' => 'Singapore',
            'state' => 'Singapore',
            'zip_code' => '238869',
            'country' => 'Singapore'
        ],
        [
            'address_name' => 'Parisian Paradise',
            'address_number' => '444',
            'city' => 'Paris',
            'state' => 'Paris',
            'zip_code' => '75001',
            'country' => 'France'
        ],
        [
            'address_name' => 'Rome Haven',
            'address_number' => '555',
            'city' => 'Rome',
            'state' => 'Rome',
            'zip_code' => '00184',
            'country' => 'Italy'
        ],
        [
            'address_name' => 'Berlin Heights',
            'address_number' => '666',
            'city' => 'Berlin',
            'state' => 'Berlin',
            'zip_code' => '10178',
            'country' => 'Germany'
        ],
        [
            'address_name' => 'London Bridge View',
            'address_number' => '777',
            'city' => 'London',
            'state' => 'London',
            'zip_code' => 'SE1 9BG',
            'country' => 'United Kingdom'
        ],
        [
            'address_name' => 'Amsterdam Canalside',
            'address_number' => '888',
            'city' => 'Amsterdam',
            'state' => 'Amsterdam',
            'zip_code' => '1012 JS',
            'country' => 'Netherlands'
        ],
        [
            'address_name' => 'Dubai Marina Residences',
            'address_number' => '999',
            'city' => 'Dubai',
            'state' => 'Dubai',
            'zip_code' => 'PO Box 93937',
            'country' => 'United Arab Emirates'
        ],
        [
            'address_name' => 'Moscow Kremlin Views',
            'address_number' => '123',
            'city' => 'Moscow',
            'state' => 'Moscow',
            'zip_code' => '101000',
            'country' => 'Russia'
        ],
    ];


    public function run(): void
    {
        $now = now();
        foreach ($this->addresses as $address) {
            DB::table('addresses')->insert([
                'address_name' => $address['address_name'],
                'address_number' => $address['address_number'],
                'city' => $address['city'],
                'state' => $address['state'],
                'zip_code' => $address['zip_code'],
                'country' => $address['country'],
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
