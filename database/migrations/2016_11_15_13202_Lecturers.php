<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lecturers extends Migration
{
    public function up()
    {
        Schema::create('Lecturers', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->text('lecturername');
            $table->integer('training_id')->unsigned();
            $table->foreign('training_id')->references('ID')->on('Trainings');
        });
    }

    public function down()
    {
        Schema::drop('Lecturers');
    }
}
