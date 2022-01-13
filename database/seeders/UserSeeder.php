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
    }
}
