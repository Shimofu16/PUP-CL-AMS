<?php

namespace Database\Seeders;

use App\Models\AttendanceLog;
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
                'course_id' => Student::find(1)->course_id,
                'computer_id' => 1,
                'status' => 'Working',
                'time_in' => now()->setTime(8, 0, 0),
                'time_out' => now()->setTime(10, 0, 0),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl nisl vitae nisl. Sed vitae nisl eget nisl aliquet aliquet. Sed vitae nisl eget nisl aliquet aliquet.',
            ],
            [
                'teacher_class_id' => 1,
                'student_id' => Student::find(2)->id,
                'course_id' => Student::find(2)->course_id,
                'computer_id' => 2,
                'status' => 'Working',
                'time_in' => now()->setTime(8, 0, 0),
                'time_out' => now()->setTime(10, 0, 0),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl nisl vitae nisl. Sed vitae nisl eget nisl aliquet aliquet. Sed vitae nisl eget nisl aliquet aliquet.',
            ],
        ];
        foreach ($data as $attendance) {
            AttendanceLog::create($attendance);
        }
    }
}
