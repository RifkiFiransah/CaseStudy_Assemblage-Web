<?php

namespace Database\Seeders;

use App\Models\Committee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommitteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            Committee::create([
                'user_id' => rand(8, 17),
                'section_id' => rand(1, 5),
                'task_id' => rand(1, 4),
                'role' => 'member'
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            Committee::create([
                'user_id' => rand(1, 7),
                'section_id' => rand(1, 5),
                'task_id' => rand(1, 4),
                'role' => 'coordinator'
            ]);
        }
    }
}
