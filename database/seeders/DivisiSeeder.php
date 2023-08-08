<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Division::create([
            "name" => "Organisasi",
            "description" => "Divisi Keorganisasi"
        ]);
        Division::create([
            "name" => "Rohani",
            "description" => "Divisi Kerohanian"
        ]);
        Division::create([
            "name" => "BPH",
            "description" => "Badan Pengurus Harian"
        ]);
        Division::create([
            "name" => "Medinfo",
            "description" => "Divisi Media dan Informasi"
        ]);
        Division::create([
            "name" => "Litbang",
            "description" => "Divisi Penelitian dan Pengembangan"
        ]);
        Division::create([
            "name" => "Olahraga",
            "description" => "Divisi Keolahragaan"
        ]);
    }
}
