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
        for($i = 0; $i<=50; $i++){
            $start = time() + rand(86400, 259200);
            DB::table('lessons')->insert([
                'User_ID' => User::inRandomOrder()->Student()->first()->id,
                'Instructor_ID' => Instructors::all()->random()->id,
                'pickup_address' => Str::random(10),
                'Pickup_city' => Str::random(10),
                'Starting_time' => date('Y/m/d H:i', $start),
                'Finishing_time' => date('Y/m/d H:i', $start + 3600),
                'Lesson_type' => Str::random(10),
                'Comment' => Str::random(10),
            ]);
    }
}
}
