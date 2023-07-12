<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
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
                'email' => 'johnystd@gmail.com',
                'address' => '1234 Street, City, Country',
                'phone' => '09123456789',
                'date_of_birth' => '2000-08-16',
                'gender' => 'Male',
                'section_id' => 1,
                'course_id' => 1,
                'sy_id' => SchoolYear::where('is_active', true)->first()->id,
            ],
            [
                'student_no' => '2019-00002',
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'email' => 'janedoe@gmail.com',
                'address' => '1234 Street, City, Country',
                'phone' => '09123456789',
                'date_of_birth' => '2000-08-16',
                'gender'=> 'Female',
                'section_id' => 1,
                'course_id' => 1,
                'sy_id' => SchoolYear::where('is_active', true)->first()->id,
            ],
            [
                'student_no' => '2019-00003',
                'first_name' => 'John',
                'last_name' => 'Smith',
                'email' => 'johnsmith@gmail.com',
                'address' => '1234 Street, City, Country',
                'phone' => '09123456789',
                'date_of_birth' => '2000-08-16',
                'gender' => 'Male',
                'section_id' => 4,
                'course_id' => 2,
                'sy_id' => SchoolYear::where('is_active', true)->first()->id,
            ],
        ];
        foreach ($data as $student) {
            Student::create($student);
        }
    }
}
