<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonTraining extends Migration
{
    public function up()
    {
        Schema::create('PersonTraining', function(Blueprint $table)
        {
            $table->primary(array('training_id', 'adviser_id'));
            $table->integer('training_id')->unsigned();
            $table->integer('adviser_id')->unsigned();
            $table->foreign('training_id')->references('ID')->on('Trainings');
            $table->foreign('adviser_id')->references('ID')->on('Advisers');
        });
    }
    public function down()
    {
        Schema::drop('PersonTraining');
    }
}
