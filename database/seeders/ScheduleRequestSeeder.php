<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'teacher_class_id' => 3,
                'date' => now()->addDay(),
                'start_time' => now()->addDay()->setTime(8, 0, 0),
                'end_time' => now()->addDay()->setTime(9, 0, 0),
                'reason' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl nisl vitae nisl. Sed vitae nisl eget nisl aliquet aliquet. Sed vitae nisl eget nisl aliquet aliquet.',
                'remarks'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, quis aliquam nisl nisl vitae nisl. Sed vitae nisl eget nisl aliquet aliquet. Sed vitae nisl eget nisl aliquet aliquet.',
            ],
        ];
        foreach ($data as $request) {
            \App\Models\ScheduleRequest::create($request);
        }
    }
}
