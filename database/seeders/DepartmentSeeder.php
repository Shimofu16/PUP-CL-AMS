<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'department_name' => 'Head Director',
                'description' => 'Head Director',
            ],
            [
                'department_name' => 'Teacher',
                'description' => 'Teacher',
            ],
            [
                'department_name' => 'Registrar',
                'description' => 'Registrar',
            ],
            [
                'department_name' => 'Cashier',
                'description' => 'Cashier',
            ],
            [
                'department_name' => 'Librarian',
                'description' => 'Librarian',
            ],
            [
                'department_name' => 'Accounting',
                'description' => 'Accounting',
            ],
            [
                'department_name' => 'Guidance',
                'description' => 'Guidance',
            ],
            [
                'department_name' => 'Admission',
                'description' => 'Admission',
            ],
            [
                'department_name' => 'Maintenance',
                'description' => 'Maintenance',
            ],
            [
                'department_name' => 'Security',
                'description' => 'Security',
            ],
            [
                'department_name' => 'Canteen',
                'description' => 'Canteen',
            ],
            [
                'department_name' => 'IT',
                'description' => 'IT',
            ],
            [
                'department_name' => 'HR',
                'description' => 'HR',
            ],
            [
                'department_name' => 'Marketing',
                'description' => 'Marketing',
            ],
            [
                'department_name' => 'Research',
                'description' => 'Research',
            ],
            [
                'department_name' => 'Student Affairs',
                'description' => 'Student Affairs',
            ],
            [
                'department_name' => 'Student Council',
                'description' => 'Student Council',
            ],
            [
                'department_name' => 'Student Publication',
                'description' => 'Student Publication',
            ],
            [
                'department_name' => 'Student Organization',
                'description' => 'Student Organization',
            ],
            [
                'department_name' => 'Student Services',
                'description' => 'Student Services',
            ],
            [
                'department_name' => 'Student Activities',
                'description' => 'Student Activities',
            ],
            [
                'department_name' => 'Student Development',
                'description' => 'Student Development',
            ],
            [
                'department_name' => 'Student Welfare',
                'description' => 'Student Welfare',
            ],
            [
                'department_name' => 'Student Health',
                'description' => 'Student Health',
            ],
            [
                'department_name' => 'Student Discipline',
                'description' => 'Student Discipline',
            ],
            [
                'department_name' => 'Student Grievance',
                'description' => 'Student Grievance',
            ],
        ];
        foreach ($data as $item) {
            \App\Models\Department::create($item);
        }
    }
}
