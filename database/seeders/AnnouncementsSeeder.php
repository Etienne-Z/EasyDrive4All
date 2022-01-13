<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AnnouncementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <= 3; $i++){
            DB::table('Announcements')->insert([
                'Role' => rand(0,1),
                'Title' => Str::random(10),
                'Description' => Str::random(250)
            ]);
        }
    }
}
