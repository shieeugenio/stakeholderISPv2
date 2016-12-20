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
            $table->increments('ID');
            $table->string('policepositioncode', 10)->nullable();
            $table->string('positionname', 45)->unique();
            $table->string('desc', 60)->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('Police_Position');
    }
}
