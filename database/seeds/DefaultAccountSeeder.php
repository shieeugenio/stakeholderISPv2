<?php

use Illuminate\Database\Seeder;

class DefaultAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'Name' => 'superadmin',
            'Status' => 1,
            'AdminType' => 0,
            'Username' => 'superadmin',
            'Password' => bcrypt('superadmin')
        ]);
    }
}
