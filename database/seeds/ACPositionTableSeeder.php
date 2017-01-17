<?php

use Illuminate\Database\Seeder;

class ACPositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advisory_position')->insert([
            'acpositionname' => 'Chairperson',
            'desc' => str_random(50)
        ]);
        DB::table('advisory_position')->insert([
            'acpositionname' => 'Vice-Chair',
            'desc' => str_random(50)
        ]);
        DB::table('advisory_position')->insert([
            'acpositionname' => 'Member',
            'desc' => str_random(50)
        ]);
    }
}
