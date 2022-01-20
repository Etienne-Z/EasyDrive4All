<?php

namespace Database\Seeders;

use App\Models\instructors;
use App\Models\User;
use Illuminate\Database\Seeder;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<3; $i++){
            $user_ID  = User::all()->random()->id;
            instructors::insert(['User_ID' => $user_ID]);
            User::WhereID($user_ID)->update(['role' => 1]);
        }
    instructors::
    insert(['User_ID' => 27]);User::WhereID(27)->update(['role' => 1]);
    }
}
