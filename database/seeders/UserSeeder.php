<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Leader
        User::create([
            "name" => "Adra",
            "email" => "adra@gmail.com",
            "position" => "leader",
            "profile" => "avatar-1.png",
            "password" => "adra123"
        ]);
        User::create([
            "name" => "Luki Ariyanto",
            "email" => "luki@gmail.com",
            "position" => "leader",
            "profile" => "avatar-2.png",
            "password" => "luki123"
        ]);
        User::create([
            "name" => "Ikhwan Okti Riyadi",
            "email" => "ikhwan@gmail.com",
            "position" => "leader",
            "profile" => "avatar-3.png",
            "password" => "ikhwan123"
        ]);
        User::create([
            "name" => "Fahmi",
            "email" => "fahmi@gmail.com",
            "position" => "leader",
            "profile" => "avatar-5.png",
            "password" => "fahmi123"
        ]);

        // Member
        User::create([
            "name" => "Rifki Firansah",
            "email" => "rifki@gmail.com",
            "position" => "member",
            "profile" => "avatar-4.png",
            "password" => "rifki123"
        ]);
        User::create([
            "name" => "Rangga",
            "email" => "rangga@gmail.com",
            "position" => "member",
            "profile" => "avatar-5.png",
            "password" => "rangga123"
        ]);
        User::create([
            "name" => "Yandi",
            "email" => "yandi@gmail.com",
            "position" => "member",
            "profile" => "avatar-1.png",
            "password" => "yandi123"
        ]);
    }
}
