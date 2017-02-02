<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ACCategoryTableSeeder::class);
        $this->call(ACSubcategoryTableSeeder::class);
        $this->call(ACPositionTableSeeder::class);
        $this->call(ACSectorTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}