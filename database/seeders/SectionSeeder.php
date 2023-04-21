<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'section_name' => 'BSIT-1A',
                'type' => 'BSIT',
            ],
            [
                'section_name' => 'BSIT-1B',
                'type' => 'BSIT',
            ],
            [
                'section_name' => 'BSIT-1C',
                'type' => 'BSIT',
            ],
            [
                'section_name' => 'BSENT-1A',
                'type' => 'BSENT',
            ],
            [
                'section_name' => 'BSENT-1B',
                'type' => 'BSENT',
            ],
            [
                'section_name' => 'BSENT-1C',
                'type' => 'BSENT',
            ],
            [
                'section_name' => 'BSED-1A',
                'type' => 'BSED',
            ],
            [
                'section_name' => 'BSED-1B',
                'type' => 'BSED',
            ],
            [
                'section_name' => 'BSED-1C',
                'type' => 'BSED',
            ],
        ];
        foreach ($data as $item) {
            \App\Models\Section::create($item);
        }
    }
}
