<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PolicePosition extends Migration
{
    public function up()
    {
        Schema::create('Police_Position', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('PositionName', 45)->unique();
            $table->string('desc', 60)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('Police_Position');
    }
}
