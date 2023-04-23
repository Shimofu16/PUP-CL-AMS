<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'subject_code' => 'IT 101',
                'subject_name' => 'Introduction to Information Technology',
                'subject_description' => 'This subject introduces the students to the basic concepts of information technology. It covers the basic concepts of computer hardware, software, and networking. It also covers the basic concepts of programming and database management.',
                'units' => 3,
            ],
            [
                'subject_code' => 'IT 102',
                'subject_name' => 'Introduction to Programming',
                'subject_description' => 'This subject introduces the students to the basic concepts of programming. It covers the basic concepts of programming languages, data types, and variables. It also covers the basic concepts of programming logic and algorithms.',
                'units' => 3,
            ],
            [
                'subject_code' => 'IT 103',
                'subject_name' => 'Introduction to Database Management',
                'subject_description' => 'This subject introduces the students to the basic concepts of database management. It covers the basic concepts of database management systems, database design, and database administration. It also covers the basic concepts of database modeling and database queries.',
                'units' => 3,
            ],
            [
                'subject_code' => 'IT 104',
                'subject_name' => 'Introduction to Computer Networks',
                'subject_description' => 'This subject introduces the students to the basic concepts of computer networks. It covers the basic concepts of computer networks, network topologies, and network protocols. It also covers the basic concepts of network security and network administration.',
                'units' => 3,
            ],
            [
                'subject_code' => 'IT 105',
                'subject_name' => 'Introduction to Web Development',
                'subject_description' => 'This subject introduces the students to the basic concepts of web development. It covers the basic concepts of web development, web design, and web programming. It also covers the basic concepts of web servers and web applications.',
                'units' => 3,
            ],
            [
                'subject_code' => 'IT 106',
                'subject_name' => 'Introduction to Operating Systems',
                'subject_description' => 'This subject introduces the students to the basic concepts of operating systems. It covers the basic concepts of operating systems, operating system design, and operating system administration. It also covers the basic concepts of operating system security and operating system maintenance.',
                'units' => 3,
            ],
            [
                'subject_code' => 'IT 107',
                'subject_name' => 'Introduction to Computer Security',
                'subject_description' => 'This subject introduces the students to the basic concepts of computer security. It covers the basic concepts of computer security, computer security threats, and computer security policies. It also covers the basic concepts of computer security administration and computer security maintenance.',
                'units' => 3,
            ],
        ];
        foreach ($data as $item) {
            \App\Models\Subject::create($item);
        }
    }
}
