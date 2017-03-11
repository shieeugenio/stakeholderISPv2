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
            $table->time('StartTime');
            $table->time('EndTime');
            $table->text('Type');
            $table->integer('PoliceInfoId')->unsigned();
            $table->foreign('PoliceInfoId')->references('id')->on('police_info');
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
