<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'section_name' => 'BSIT-1A',
                'course_id' => 1,
            ],
            [
                'section_name' => 'BSIT-1B',
                'course_id' => 1,
            ],
            [
                'section_name' => 'BSIT-1C',
                'course_id' => 1,
            ],
            [
                'section_name' => 'BSENT-1A',
                'course_id' => 2,
            ],
            [
                'section_name' => 'BSENT-1B',
                'course_id' => 2,
            ],
            [
                'section_name' => 'BSENT-1C',
                'course_id' => 2,
            ],
            [
                'section_name' => 'BSED-1A',
                'course_id' => 3,
            ],
            [
                'section_name' => 'BSED-1B',
                'course_id' => 3,
            ],
            [
                'section_name' => 'BSED-1C',
                'course_id' => 3,
            ],
        ];
        foreach ($data as $item) {
            \App\Models\Section::create($item);
        }
    }
}
