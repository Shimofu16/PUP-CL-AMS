<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'admin',
                'display_name' => 'Admin',
            ],
            [
                'name' => 'faculty',
                'display_name' => 'Faculty',
            ],
            [
                'name' => 'teacher',
                'display_name' => 'Teacher',
            ],
            [
                'name' => 'student',
                'display_name' => 'Student',
            ],
        ];
        foreach ($data as $item) {
            \App\Models\Role::create($item);
        }
    }
}
