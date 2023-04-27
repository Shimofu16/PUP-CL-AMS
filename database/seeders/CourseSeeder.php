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
                'display_name' => 'Bachelor of Science in Information Technology',
                'description' => 'This is a course for IT students'
            ],
            [
                'course_code' => 'BSENT',
                'display_name' => 'Bachelor of Science in Entrepreneurship',
                'description' => 'This is a course for Entrepreneurship students'
            ],
            [
                'course_code' => 'BBTE',
                'display_name' => 'Bachelor of Business Technology Entrepreneurship',
                'description' => 'This is a course for BBTE students'
            ],
            [
                'course_code' => 'BSCS',
                'display_name' => 'Bachelor of Science in Computer Science',
                'description' => 'This is a course for Computer Science students'
            ]

        ];
        foreach ($data as $item) {
            \App\Models\Course::create($item);
        }
    }
}
