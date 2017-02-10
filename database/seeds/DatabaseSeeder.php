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
        $this->call(DefaultAccountSeeder::class);
        $this->call(ACCategoryTableSeeder::class);
        $this->call(ACSubcategoryTableSeeder::class);
        $this->call(ACPositionTableSeeder::class);
        $this->call(ACSectorTableSeeder::class);
        
    }
}

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
            'name' => 'admin',
            'status' => 1,
            'email' => 'admin',
            'password' => bcrypt('admin')
        ]);
    }
}
