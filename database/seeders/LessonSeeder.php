<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\instructors;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert([
            'Student_ID' => User::inRandomOrder()->WhereStudent()->first()->id,
            'Instructor_ID' => Instructors::all()->random()->id,
            'pickup_address' => "klinkerstraat 12",
            'Pickup_city' => "Dalfsen",
            'Starting_time' => '2022-01-31 15:00',
            'Finishing_time' => '2022-01-31 16:00',
            'Goal' => "rijden op de snelweg"
        ]);

        DB::table('lessons')->insert([
            'Student_ID' => User::inRandomOrder()->WhereStudent()->first()->id,
            'Instructor_ID' => Instructors::all()->random()->id,
            'pickup_address' => "klinkersweg 12",
            'Pickup_city' => "Ommen",
            'Starting_time' => '2022-02-05 09:00',
            'Finishing_time' => '2022-02-05 10:00',
            'Goal' => "File parkeren"
        ]);

        DB::table('lessons')->insert([
            'Student_ID' => User::inRandomOrder()->WhereStudent()->first()->id,
            'Instructor_ID' => Instructors::all()->random()->id,
            'pickup_address' => "klinkerstraat 12",
            'Pickup_city' => "Dalfsen",
            'Starting_time' => '2022-01-31 11:00',
            'Finishing_time' =>  '2022-01-31 12:00',
            'Goal' => "Plaats op de weg"
        ]);

        DB::table('lessons')->insert([
            'Student_ID' => User::inRandomOrder()->WhereStudent()->first()->id,
            'Instructor_ID' => Instructors::all()->random()->id,
            'pickup_address' => "hopjeslaan 21",
            'Pickup_city' => "Zwolle",
            'Starting_time' => '2022-02-15 15:00',
            'Finishing_time' => '2022-02-15 16:00',
            'Goal' => "Stress rijden"
        ]);

        DB::table('lessons')->insert([
            'Student_ID' => User::inRandomOrder()->WhereStudent()->first()->id,
            'Instructor_ID' => Instructors::all()->random()->id,
            'pickup_address' => "klinkerstraat 12",
            'Pickup_city' => "Dalfsen",
            'Starting_time' => '2022-01-30 15:00',
            'Finishing_time' => '2022-01-30 16:00',
            'Goal' => "rijden op de snelweg"
        ]);

        DB::table('lessons')->insert([
            'Student_ID' => User::inRandomOrder()->WhereStudent()->first()->id,
            'Instructor_ID' => Instructors::all()->random()->id,
            'pickup_address' => "abcstraat 12",
            'Pickup_city' => "Dalfsen",
            'Starting_time' => '2022-01-31 20:00',
            'Finishing_time' => '2022-01-31 21:00',
            'Goal' => "rijden op de snelweg"
        ]);

        DB::table('lessons')->insert([
            'Student_ID' => User::inRandomOrder()->WhereStudent()->first()->id,
            'Instructor_ID' => Instructors::all()->random()->id,
            'pickup_address' => "hopjeslaan 12",
            'Pickup_city' => "Zwolle",
            'Starting_time' => '2022-02-03 14:00',
            'Finishing_time' => '2022-02-03 15:00',
            'Goal' => "plaats op de weg"
        ]);

        DB::table('lessons')->insert([
            'Student_ID' => User::inRandomOrder()->WhereStudent()->first()->id,
            'Instructor_ID' => Instructors::all()->random()->id,
            'pickup_address' => "hopjeslaan 12",
            'Pickup_city' => "Zwolle",
            'Starting_time' =>  '2022-02-03 12:00',
            'Finishing_time' => '2022-02-03 13:00',
            'Goal' => "inhalen"
        ]);

        DB::table('lessons')->insert([
            'Student_ID' => User::inRandomOrder()->WhereStudent()->first()->id,
            'Instructor_ID' => Instructors::all()->random()->id,
            'pickup_address' => "klinkerstraat 12",
            'Pickup_city' => "Dalfsen",
            'Starting_time' => '2022-01-30 09:00',
            'Finishing_time' => '2022-01-30 10:00',
            'Goal' => "parkeren"
        ]);

        DB::table('lessons')->insert([
            'Student_ID' => User::inRandomOrder()->WhereStudent()->first()->id,
            'Instructor_ID' => Instructors::all()->random()->id,
            'pickup_address' => "klinkerstraat 12",
            'Pickup_city' => "Dalfsen",
            'Starting_time' => '2022-01-24 15:00',
            'Finishing_time' => '2022-01-24 16:00',
            'Goal' => "auto theorie"
        ]);

        DB::table('lessons')->insert([
            'Student_ID' => User::inRandomOrder()->WhereStudent()->first()->id,
            'Instructor_ID' => Instructors::all()->random()->id,
            'pickup_address' => "abclaan 12",
            'Pickup_city' => "Dalfsen",
            'Starting_time' => '2022-01-25 15:00',
            'Finishing_time' => '2022-01-25 16:00',
            'Goal' => "plaats op de weg"
        ]);

        DB::table('lessons')->insert([
            'Student_ID' => User::inRandomOrder()->WhereStudent()->first()->id,
            'Instructor_ID' => Instructors::all()->random()->id,
            'pickup_address' => "boerenplaats 12",
            'Pickup_city' => "Dalfsen",
            'Starting_time' => '2022-01-24 10:00',
            'Finishing_time' => '2022-01-24 11:00',
            'Goal' => "auto theorie"
        ]);

        DB::table('lessons')->insert([
            'Student_ID' => User::inRandomOrder()->WhereStudent()->first()->id,
            'Instructor_ID' => Instructors::all()->random()->id,
            'pickup_address' => "klinkerstraat 12",
            'Pickup_city' => "Dalfsen",
            'Starting_time' => '2022-01-25 13:30',
            'Finishing_time' =>'2022-01-25 14:30',
            'Goal' => "Snelweg rijden"
        ]);
}
}
