<?php

use Illuminate\Database\Seeder;

class ACSectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('ac_sector')->insert([
            'sectorname' => 'LGU',
            'desc' => str_random(50)
        ]);

         DB::table('ac_sector')->insert([
            'sectorname' => 'Academe',
            'desc' => str_random(50)
        ]);
         DB::table('ac_sector')->insert([
            'sectorname' => 'NGA',
            'desc' => str_random(50)
        ]);
         DB::table('ac_sector')->insert([
            'sectorname' => 'Religious',
            'desc' => str_random(50)
        ]);
         DB::table('ac_sector')->insert([
            'sectorname' => 'Business',
            'desc' => str_random(50)
        ]);
         DB::table('ac_sector')->insert([
            'sectorname' => 'Community',
            'desc' => str_random(50)
        ]);
         DB::table('ac_sector')->insert([
            'sectorname' => 'Youth',
            'desc' => str_random(50)
        ]);
         DB::table('ac_sector')->insert([
            'sectorname' => 'NAPOLCOM',
            'desc' => str_random(50)
        ]);
         DB::table('ac_sector')->insert([
            'sectorname' => 'Media',
            'desc' => str_random(50)
        ]);
         DB::table('ac_sector')->insert([
            'sectorname' => 'Judiciary',
            'desc' => str_random(50)
        ]);
         DB::table('ac_sector')->insert([
            'sectorname' => 'PNP Personnel',
            'desc' => str_random(50)
        ]);
    }
}
