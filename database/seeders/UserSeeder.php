<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<=24; $i++){
            DB::table('users')->insert([
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'city' => Str::random(10),
                'address' => Str::random(10),
                'zipcode' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'sick' => 0,
                'lesson_hours' => rand(2,40),
                'role' => 0,
                'password' => Hash::make('password')
            ]);
        }
        DB::table('users')->insert([
            'first_name' => "Leerling0",
            'last_name' => "Leerling0",
            'city' => "Stad0",
            'address' => "Adres0",
            'zipcode' => "Postcode0",
            'email' => "leerling0@gmail.com",
            'sick' => 0,
            'lesson_hours' => rand(2,40),
            'role' => 0,
            'password' => Hash::make('Leerling0')
        ]);
        DB::table('users')->insert([
            'first_name' => "Instructeur1",
            'last_name' => "Instructeur1",
            'city' => "Stad1",
            'address' => "Adres1",
            'zipcode' => "Postcode1",
            'email' => "Instructeur1@gmail.com",
            'sick' => 0,
            'lesson_hours' => 0,
            'role' => 1,
            'password' => Hash::make('Instructeur1')
        ]);

        DB::table('users')->insert([
            'first_name' => "Admin2",
            'last_name' => "Admin2",
            'city' => "Stad2",
            'address' => "Adres2",
            'zipcode' => "Postcode2",
            'email' => "Admin2@gmail.com",
            'sick' => 0,
            'lesson_hours' => 0,
            'role' => 2,
            'password' => Hash::make('Admin2')
        ]);
    }
}
