<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\instructors;

class InstructorhasusersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = user::notInstructor()->get();
        foreach($users as $user){
            DB::table('instructor_has_users')->insert([
                'User_ID' => $user->id,
                'Instructor_ID' => Instructors::all()->random()->id
            ]);
        }

    }
}
