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
                //Standaard login accounts
                DB::table('users')->insert([
                    'first_name' => "Leerling0",
                    'last_name' => "Leerling0",
                    'city' => "Stad0",
                    'address' => "Adres0",
                    'zipcode' => "Postcode0",
                    'email' => "leerling0@gmail.com",
                    'sick' => 0,
                    'amount_sick' => 0,
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
                    'amount_sick' => 0,
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
                    'amount_sick' => 0,
                    'lesson_hours' => 0,
                    'role' => 2,
                    'password' => Hash::make('Admin2')
                ]);

                //instructeuren
                DB::table('users')->insert([
                    'first_name' => "Henk",
                    'last_name' => "testo",
                    'city' => "dalfsen",
                    'address' => "huppeltjesstraat 12",
                    'zipcode' => "1234AB",
                    'email' => 'henktesto@gmail.com',
                    'sick' => 0,
                    'amount_sick' => 0,
                    'lesson_hours' => 0,
                    'role' => 1,
                    'password' => Hash::make('password')
                ]);

                DB::table('users')->insert([
                    'first_name' => "Frank",
                    'insertion' =>  "de",
                    'last_name' => "Boer",
                    'city' => "Ommen",
                    'address' => "hankenstraat 12",
                    'zipcode' => "3321AB",
                    'email' => 'FrankdBoer@gmail.com',
                    'sick' => 0,
                    'amount_sick' => 0,
                    'lesson_hours' => 0,
                    'role' => 1,
                    'password' => Hash::make('password')
                ]);

                DB::table('users')->insert([
                    'first_name' => "Stefan",
                    'last_name' => "boos",
                    'city' => "dalfsen",
                    'address' => "huppeltjesstraat 34",
                    'zipcode' => "1234AC",
                    'email' => 'stefan@gmail.com',
                    'sick' => 0,
                    'amount_sick' => 0,
                    'lesson_hours' => 0,
                    'role' => 1,
                    'password' => Hash::make('password')
                ]);

                DB::table('users')->insert([
                    'first_name' => "Henk",
                    'insertion' => 'de',
                    'last_name' => "Boer",
                    'city' => "Ommen",
                    'address' => "hankenstraat 12",
                    'zipcode' => "3321AB",
                    'email' => 'HenkdBoer@gmail.com',
                    'sick' => 0,
                    'amount_sick' => 0,
                    'lesson_hours' => 0,
                    'role' => 1,
                    'password' => Hash::make('password')
                ]);

                //Leerlingen
                DB::table('users')->insert([
                    'first_name' => "klaas",
                    'last_name' => "Boer",
                    'city' => "Zwolle",
                    'address' => "abcstraat 12",
                    'zipcode' => "123ab",
                    'email' => 'klaasboer@gmail.com',
                    'sick' => 0,
                    'amount_sick' => 0,
                    'lesson_hours' => 0,
                    'role' => 0,
                    'password' => Hash::make('password')
                ]);

                DB::table('users')->insert([
                    'first_name' => "mirjam",
                    'insertion' => 'de',
                    'last_name' => "wolf",
                    'city' => "Ommen",
                    'address' => "klinkerlaan 12",
                    'zipcode' => "3221AB",
                    'email' => 'mdewolf@gmail.com',
                    'sick' => 0,
                    'amount_sick' => 0,
                    'lesson_hours' => 0,
                    'role' => 0,
                    'password' => Hash::make('password')
                ]);

                DB::table('users')->insert([
                    'first_name' => "sander",
                    'insertion' => 'de',
                    'last_name' => "hander",
                    'city' => "dalfsen",
                    'address' => "abcderstraat 12",
                    'zipcode' => "1221AB",
                    'email' => 'Sanderdehander@gmail.com',
                    'sick' => 0,
                    'amount_sick' => 0,
                    'lesson_hours' => 0,
                    'role' => 0,
                    'password' => Hash::make('password')
                ]);

                DB::table('users')->insert([
                    'first_name' => "hans",
                    'last_name' => "anders",
                    'city' => "Ommen",
                    'address' => "hansjesstraat 12",
                    'zipcode' => "1111ad",
                    'email' => 'specsavers@gmail.com',
                    'sick' => 0,
                    'amount_sick' => 0,
                    'lesson_hours' => 0,
                    'role' => 0,
                    'password' => Hash::make('password')
                ]);

                DB::table('users')->insert([
                    'first_name' => "frenkie",
                    'insertion' => 'de',
                    'last_name' => "ballenman",
                    'city' => "Ommen",
                    'address' => "soepballetjeslaan 12",
                    'zipcode' => "1234ab",
                    'email' => 'ikvindtsoepballenlekker@gmail.com',
                    'sick' => 0,
                    'amount_sick' => 0,
                    'lesson_hours' => 0,
                    'role' => 0,
                    'password' => Hash::make('password')
                ]);
    }
}
