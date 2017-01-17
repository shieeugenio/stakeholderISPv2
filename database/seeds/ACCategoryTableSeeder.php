<?php

use Illuminate\Database\Seeder;

class ACCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //created by ren william lucas buluran
    public function run()
    {
        DB::table('ac_category')->insert([
            'categoryname' => 'Regional',
            'desc' => str_random(50)
        ]);
        DB::table('ac_category')->insert([
            'categoryname' => 'Provincial',
            'desc' => str_random(50)
        ]);
        DB::table('ac_category')->insert([
            'categoryname' => 'City',
            'desc' => str_random(50)
        ]);
        DB::table('ac_category')->insert([
            'categoryname' => 'Municipal',
            'desc' => str_random(50)
        ]);
        DB::table('ac_category')->insert([
            'categoryname' => 'D-Staff',
            'desc' => str_random(50)
        ]);
        DB::table('ac_category')->insert([
            'categoryname' => 'NSU',
            'desc' => str_random(50)
        ]);
        DB::table('ac_category')->insert([
            'categoryname' => 'NAGPTD',
            'desc' => str_random(50)
        ]);

    }
}
