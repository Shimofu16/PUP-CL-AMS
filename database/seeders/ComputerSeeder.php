<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            /* generate fake  data with these fields
                computer_number
computer_name
os
processor
memory
storage
             */
            [
                'computer_number' => '01',
                'computer_name' => 'Computer 01',
                'os' => 'Windows 10',
                'processor' => 'Intel Core i5',
                'memory' => '8GB',
                'storage' => '500GB',
                'graphics' => 'Nvidia GTX 1050',
                'status' => 'Working'
            ],
            [
                'computer_number' => '02',
                'computer_name' => 'Computer 02',
                'os' => 'Windows 10',
                'processor' => 'Intel Core i5',
                'memory' => '8GB',
                'storage' => '500GB',
                'graphics' => 'Nvidia GTX 1050',
                'status' => 'Working'
            ],
            [
                'computer_number' => '03',
                'computer_name' => 'Computer 03',
                'os' => 'Windows 10',
                'processor' => 'Intel Core i5',
                'memory' => '8GB',
                'storage' => '500GB',
                'graphics' => 'Nvidia GTX 1050',
                'status' => 'Working'
            ],
            [
                'computer_number' => '04',
                'computer_name' => 'Computer 04',
                'os' => 'Windows 10',
                'processor' => 'Intel Core i5',
                'memory' => '8GB',
                'storage' => '500GB',
                'graphics' => 'Nvidia GTX 1050',
                'status' => 'Working'
            ],
            [
                'computer_number' => '05',
                'computer_name' => 'Computer 05',
                'os' => 'Windows 10',
                'processor' => 'Intel Core i5',
                'memory' => '8GB',
                'storage' => '500GB',
                'graphics' => 'Nvidia GTX 1050',
                'status' => 'Working'
            ],
            [
                'computer_number' => '06',
                'computer_name' => 'Computer 06',
                'os' => 'Windows 10',
                'processor' => 'Intel Core i5',
                'memory' => '8GB',
                'storage' => '500GB',
                'graphics' => 'Nvidia GTX 1050',
                'status' => 'Working'
            ],
            [
                'computer_number' => '07',
                'computer_name' => 'Computer 07',
                'os' => 'Windows 10',
                'processor' => 'Intel Core i5',
                'memory' => '8GB',
                'storage' => '500GB',
                'graphics' => 'Nvidia GTX 1050',
                'status' => 'Working'
            ],
            [
                'computer_number' => '08',
                'computer_name' => 'Computer 08',
                'os' => 'Windows 10',
                'processor' => 'Intel Core i5',
                'memory' => '8GB',
                'storage' => '500GB',
                'graphics' => 'Nvidia GTX 1050',
                'status' => 'Working'
            ],
            [
                'computer_number' => '09',
                'computer_name' => 'Computer 09',
                'os' => 'Windows 10',
                'processor' => 'Intel Core i5',
                'memory' => '8GB',
                'storage' => '500GB',
                'graphics' => 'Nvidia GTX 1050',
                'status' => 'Working'
            ],
            [
                'computer_number' => '10',
                'computer_name' => 'Computer 10',
                'os' => 'Windows 10',
                'processor' => 'Intel Core i5',
                'memory' => '8GB',
                'storage' => '500GB',
                'graphics' => 'Nvidia GTX 1050',
                'status' => 'Working'
            ],
        ];
        foreach ($data as $item) {
            \App\Models\Computer::create($item);
        }
    }
}
