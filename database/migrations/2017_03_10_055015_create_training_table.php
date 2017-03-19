<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
         Schema::create('trainings', function(Blueprint $table){
            $table->increments('id');
            $table->text('TrainingName');
            $table->date('StartDate');
            $table->date('EndDate');
            $table->text('Location');
            $table->string('Organizer', 45);
            $table->time('StartTime')->nullable();
            $table->time('EndTime')->nullable();
            $table->text('Type');
            $table->integer('SProfileId')->unsigned();
            $table->foreign('SProfileId')->references('id')->on('stakeholder_profile');
            $table->timestamps();
        });
        
    }//up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('trainings');
        
    }//down
}
