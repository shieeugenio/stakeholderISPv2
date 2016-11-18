<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PolicePositions extends Migration
{
    public function up()
    {
        Schema::create('PolicePositions', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->string('positionname', 45);
            $table->string('policepositioncode', 10);
            $table->string('desc', 60)->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('PolicePositions');
    }
}
