<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
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
                'teacher_id' => 2,
                'subject_id' => 1,
                'section_id' => 1,
                'date' =>  now()->subDays(7),
                'start_time' => now()->setTime(8, 0),
                'end_time' =>  now()->setTime(10, 0),
                'sy_id' => SchoolYear::where('is_active', true)->first()->id,
                'semester_id' => 1,
            ],
            [
                'teacher_id' => 2,
                'subject_id' => 2,
                'section_id' => 1,
                'date' =>  now()->subDays(2),
                'start_time' => now()->setTime(8, 0),
                'end_time' =>  now()->setTime(10, 0),
                'sy_id' => SchoolYear::where('is_active', true)->first()->id,
                'semester_id' => 1,
            ],
            [
                'teacher_id' => 2,
                'subject_id' => 3,
                'section_id' => 1,
                'date' =>  now(),
                'start_time' => now()->setTime(8, 0),
                'end_time' =>  now()->setTime(10, 0),
                'sy_id' => SchoolYear::where('is_active', true)->first()->id,
                'semester_id' => 1,
            ],
        ];
        foreach ($data as $teacherClass) {
            TeacherClass::create($teacherClass);
        }
    }
}
