<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UnitOffices extends Migration
{
    public function up()
    {
        Schema::create('unit_offices', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('UnitOfficeName', 45)->unique();
            $table->string('UnitOfficeHasField', 45)->unique();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('unit_offices');
    }
}
