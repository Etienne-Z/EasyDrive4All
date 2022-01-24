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
        instructors::
        insert([
            'User_ID' => 2
        ]);

        instructors::
        insert([
            'User_ID' => 4
        ]);

        instructors::
        insert([
            'User_ID' => 5
        ]);

        instructors::
        insert([
            'User_ID' => 6
        ]);

        instructors::
        insert([
            'User_ID' => 7
        ]);
}
}
