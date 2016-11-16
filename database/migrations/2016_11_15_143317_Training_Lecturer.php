<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrainingLecturer extends Migration
{
    public function up()
    {
        Schema::create('TrainingLecturer', function(Blueprint $table)
        {
            $table->primary(array('training_id', 'lecturer_id'));
            $table->integer('training_id')->unsigned();
            $table->integer('lecturer_id')->unsigned();
            $table->foreign('training_id')->references('ID')->on('Trainings');
            $table->foreign('lecturer_id')->references('ID')->on('Lecturers');
        });
    }
    public function down()
    {
        Schema::drop('TrainingLecturer');
    }
}
