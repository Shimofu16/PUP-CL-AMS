<?php

namespace Database\Seeders;

use App\Models\TeacherClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'teacher_id' => 1,
                'subject_id' => 1,
                'section_id' => 1,
                'date' =>  now()->subDays(7),
                /* 8am */
                'start_time' => '08:00:00',
                /* 10am */
                'end_time' => '10:00:00',
            ],
            [
                'teacher_id' => 1,
                'subject_id' => 2,
                'section_id' => 1,
                'date' =>  now()->subDays(2),
                /* 8am */
                'start_time' => '08:00:00',
                /* 10am */
                'end_time' => '10:00:00',
            ],
            [
                'teacher_id' => 1,
                'subject_id' => 3,
                'section_id' => 1,
                'date' =>  now(),
                /* 8am */
                'start_time' => '08:00:00',
                /* 10am */
                'end_time' => '10:00:00',
            ],
        ];
        foreach ($data as $teacherClass) {
            TeacherClass::create($teacherClass);
        }
    }
}
