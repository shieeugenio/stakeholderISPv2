<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trainings extends Migration
{
    public function up()
    {
        Schema::create('Trainings', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->string('trainingname', 100);
            $table->date('startdate');
            $table->date('enddate');
            $table->string('location', 100);
            $table->string('organizer', 45);
            $table->time('starttime');
            $table->time('endtime');
            $table->string('trainingtype', 45);
            $table->integer('police_id')->unsigned();
            $table->foreign('police_id')->references('ID')->on('PoliceAdvisory');
        });
    }

    public function down()
    {
        Schema::drop('Trainings');
    }
}
