<?php

namespace Database\Seeders;

use App\Models\FacultyMember;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'email' => FacultyMember::find(1)->email,
                'password' => Hash::make('password'),
                'role_id' => 1,
                'faculty_member_id' => 1,
            ],
            [
                'email' => FacultyMember::find(2)->email,
                'password' => Hash::make('password'),
                'role_id' => 2,
                'faculty_member_id' => 2,
            ],
            [
                'email' => Student::find(1)->email,
                'password' => Hash::make('password'),
                'role_id' => 4,
                'student_id' => 1,
            ],
            [
                'email' => Student::find(2)->email,
                'password' => Hash::make('password'),
                'role_id' => 4,
                'student_id' => 2,
            ],
            [
                'email' => Student::find(3)->email,
                'password' => Hash::make('password'),
                'role_id' => 4,
                'student_id' => 3,
            ]
        ];
        foreach ($data as $item) {
            \App\Models\User::create($item);
        }
    }
}
