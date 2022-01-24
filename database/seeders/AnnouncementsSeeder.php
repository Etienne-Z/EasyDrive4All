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
        DB::table('Announcements')->insert([
            'Role' => 0,
            'Title' => "Frank de boer is ziek",
            'Description' => "frank de boer is ziek, al zijn lessen komen te vervallen voor vandaag en morgen."
        ]);
        DB::table('Announcements')->insert([
            'Role' => 0,
            'Title' => "Henk heeft zijn been gebroken",
            'Description' => "Henk zijn been doet het niet meer, al zijn lessen worden opgevangen door andere instructeurs, er wordt contact met u opgenomen."
        ]);
        DB::table('Announcements')->insert([
            'Role' => 1,
            'Title' => "Extra vrije dag",
            'Description' => "Om werkdruk te verminderen hebben alle instructeurs een extra vrije dag op 3 maart."
        ]);
        DB::table('Announcements')->insert([
            'Role' => 1,
            'Title' => "25 jaar",
            'Description' => "Ons bedrijf bestaat 25 jaar en daarom is het feest! 2 maart is daarom een feestdag op het hoofdkantoor."
        ]);
    }
}
