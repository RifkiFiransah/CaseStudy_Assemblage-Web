<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create(
            [
                "name" => "Anjang Sono",
                "status" => "progress",
                "user_id" => "2",
                "division_id" => "1",
                "tanggal" => "2023-09-12"
            ]
        );

        Task::create([
            "name" => "Makrab",
            "status" => "success",
            "user_id" => "5",
            "division_id" => "1",
            "tanggal" => "2023-05-10"
        ]);

        Task::create([
            "name" => "Pengabdian Masyarakat",
            "status" => "success",
            "user_id" => "3",
            "division_id" => "5",
            "tanggal" => "2023-06-15"
        ]);

        Task::create([
            "name" => "Malam Bina Iman dan Taqwa",
            "status" => "progress",
            "user_id" => "1",
            "division_id" => "2",
            "tanggal" => "2023-07-18"
        ]);
    }
}
