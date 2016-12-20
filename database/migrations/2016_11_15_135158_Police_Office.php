<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PoliceOffice extends Migration
{
    public function up()
    {
        Schema::create('Police_Office', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->string('policeofficecode', 10)->nullable();
            $table->string('officename', 45)->unique();
            $table->string('police_address', 100);
            $table->string('contactno', 45);
            $table->string('desc', 60)->nullable();
            $table->tinyInteger('policestaff');
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::drop('Police_Office');
    }
}
