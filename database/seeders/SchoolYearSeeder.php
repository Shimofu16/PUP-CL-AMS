<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => '2021-2022',
                'start_date' => '2021-06-01',
                'end_date' => '2022-03-31',
                'is_active' => true,
                'semester_id' => 1,
            ],
        ];
        foreach ($data as $key => $value) {
            \App\Models\SchoolYear::create($value);
        }
    }
}
