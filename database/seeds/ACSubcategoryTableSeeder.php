<?php

use Illuminate\Database\Seeder;

class ACSubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //created by ren william lucas buluran
    public function run()
    {
        DB::table('ac_subcategory')->insert([
            'subcategoryname' => 'NASU',
            'desc' => str_random(50),
            'categoryId' => 6
        ]);
        DB::table('ac_subcategory')->insert([
            'subcategoryname' => 'NOSU',
            'desc' => str_random(50),
            'categoryId' => 6
        ]);
        DB::table('ac_subcategory')->insert([
            'subcategoryname' => 'Sample 3',
            'desc' => str_random(50),
            'categoryId' => 1
        ]);
        DB::table('ac_subcategory')->insert([
            'subcategoryname' => 'Sample 4',
            'desc' => str_random(50),
            'categoryId' => 1
        ]);
        DB::table('ac_subcategory')->insert([
            'subcategoryname' => 'Sample 5',
            'desc' => str_random(50),
            'categoryId' => 3
        ]);
    }
}
