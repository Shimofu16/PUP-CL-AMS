<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'student_no' => '2019-00001',
                'first_name' => 'Johny',
                'last_name' => 'Doe',
                'email' => 'johnydoe@gmail.com',
                'address' => '1234 Street, City, Country',
                'phone' => '09123456789',
                'date_of_birth' => '2000-08-16',
                'gender' => 'Male',
                'section_id' => 1,
                'course_id' => 1,
            ],
        ];
        foreach ($data as $student) {
            Student::create($student);
        }
    }
}
