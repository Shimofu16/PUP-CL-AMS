<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* generate a fake data of courses */
        $data = [
            [
                'course_code' => 'BSIT',
                'course_name' => 'Bachelor of Science in Information Technology',
            ],
            [
                'course_code' => 'BSENT',
                'course_name' => 'Bachelor of Science in Entrepreneurship',
            ],
            [
                'course_code' => 'BBTE',
                'course_name' => 'Bachelor of Business Technology Entrepreneurship',
            ],
            [
                'course_code' => 'BSCS',
                'course_name' => 'Bachelor of Science in Computer Science',
            ]

        ];
        foreach ($data as $item) {
            \App\Models\Course::create($item);
        }
    }
}
