<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PoliceAdvisory extends Migration
{
    public function up()
    {
        Schema::create('PoliceAdvisory', function(Blueprint $table)
        {
            $table->primary('ID');
            $table->string('authorityorder', 20)->unique();
            $table->integer('ID')->unsigned();
            $table->integer('police_position_id')->unsigned();
            $table->integer('policeoffice_id')->unsigned();
            $table->foreign('ID')->references('ID')->on('Advisers');
            $table->foreign('police_position_id')->references('ID')->on('PolicePositions');
            $table->foreign('policeoffice_id')->references('ID')->on('PoliceOfficeSecond');
        });
    }

    public function down()
    {
        Schema::drop('PoliceAdvisory');
    }
}
