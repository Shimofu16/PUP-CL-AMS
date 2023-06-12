<?php

namespace Database\Seeders;

use App\Models\AttendanceLog;
use App\Models\SchoolYear;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'teacher_class_id' => 1,
                'student_id' => Student::find(1)->id,
                'computer_id' => 1,
                'status' => 'Working',
                'sy_id' => SchoolYear::where('is_active', true)->first()->id,
                'semester_id' => 1,
            ],
            [
                'teacher_class_id' => 1,
                'student_id' => Student::find(2)->id,
                'computer_id' => 2,
                'status' => 'Working',
                'sy_id' => SchoolYear::where('is_active', true)->first()->id,
                'semester_id' => 1,
            ],
            [
                'teacher_class_id' => 2,
                'student_id' => Student::find(1)->id,
                'computer_id' => 1,
                'status' => 'Working',
                'sy_id' => SchoolYear::where('is_active', true)->first()->id,
                'semester_id' => 1,
            ],
            [
                'teacher_class_id' => 2,
                'student_id' => Student::find(2)->id,
                'computer_id' => 2,
                'status' => 'Working',
                'sy_id' => SchoolYear::where('is_active', true)->first()->id,
                'semester_id' => 1,
            ],
        ];
        foreach ($data as $attendance) {
            AttendanceLog::create($attendance);
        }
    }
}
