<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PoliceOffices extends Migration
{
    public function up()
    {
        Schema::create('PoliceOffices', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->string('officename', 45);
            $table->string('police_address', 100);
            $table->string('contactno', 45);
        });
    }
    public function down()
    {
        Schema::drop('PoliceOffices');
    }
}
