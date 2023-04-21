<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\FacultyMember;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CourseSeeder::class,
            ComputerSeeder::class,
            DepartmentSeeder::class,
            FacultyMemberSeeder::class,
            RoleSeeder::class,
            SectionSeeder::class,
            UserSeeder::class,
        ]);
    }
}
