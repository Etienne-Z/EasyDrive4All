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
        DB::table('Cars')->insert([
            'Type' => 1,
            'Brand' => "Mercedes",
            'License_plate' => "12-353-ab"
        ]);
        DB::table('Cars')->insert([
            'Type' => 0,
            'Brand' => "Tesla",
            'License_plate' => "12-353-ac"
        ]);
        DB::table('Cars')->insert([
            'Type' => 0,
            'Brand' => "Tesla",
            'License_plate' => "12-353-ad"
        ]);
    }
}
