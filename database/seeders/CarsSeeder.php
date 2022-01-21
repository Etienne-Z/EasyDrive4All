<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <= 3; $i++){
            DB::table('Cars')->insert([
                'Type' => 0,
                'Brand' => Str::random(10),
                'License_plate' => Str::random(10)
            ]);
        }
    }
}
