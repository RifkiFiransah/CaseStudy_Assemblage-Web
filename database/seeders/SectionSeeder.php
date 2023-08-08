<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::create([
            'name' => 'Seksi Acara'
        ]);
        Section::create([
            'name' => 'Seksi PDD'
        ]);
        Section::create([
            'name' => 'Seksi Konsumsi'
        ]);
        Section::create([
            'name' => 'Seksi Peralatan'
        ]);
        Section::create([
            'name' => 'Seksi Humas'
        ]);
    }
}
