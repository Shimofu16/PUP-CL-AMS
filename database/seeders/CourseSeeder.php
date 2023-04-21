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
        /* generate a fake data of courses for computer */
        $data = [
            [
                'course_code' => 'IT-101',
                'course_name' => 'Introduction to Computer',
                'course_description' => 'Introduction to Computer',
            ],
            [
                'course_code' => 'IT-102',
                'course_name' => 'Computer Hardware',
                'course_description' => 'Computer Hardware',
            ],
            [
                'course_code' => 'IT-103',
                'course_name' => 'Computer Software',
                'course_description' => 'Computer Software',
            ],
            [
                'course_code' => 'IT-104',
                'course_name' => 'Computer Networking',
                'course_description' => 'Computer Networking',
            ],
            [
                'course_code' => 'IT-105',
                'course_name' => 'Computer Programming',
                'course_description' => 'Computer Programming',
            ],
            [
                'course_code' => 'IT-106',
                'course_name' => 'Computer Security',
                'course_description' => 'Computer Security',
            ],
            [
                'course_code' => 'IT-107',
                'course_name' => 'Computer Maintenance',
                'course_description' => 'Computer Maintenance',
            ],
            [
                'course_code' => 'IT-108',
                'course_name' => 'Computer Troubleshooting',
                'course_description' => 'Computer Troubleshooting',
            ],
            [
                'course_code' => 'IT-109',
                'course_name' => 'Computer Repair',
                'course_description' => 'Computer Repair',
            ],
            [
                'course_code' => 'IT-110',
                'course_name' => 'Computer Installation',
                'course_description' => 'Computer Installation',
            ],
            [
                'course_code' => 'IT-111',
                'course_name' => 'Computer Repair',
                'course_description' => 'Computer Repair',
            ],
        ];
        foreach ($data as $item) {
            \App\Models\Course::create($item);
        }
    }
}
