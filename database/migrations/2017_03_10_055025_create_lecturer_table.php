<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('lecturers', function(Blueprint $table) {
            $table->increments('id');
            $table->text('LecturerName');
            $table->integer('TrainingId')->unsigned();
            $table->foreign('TrainingId')->references('id')->on('trainings');
            $table->timestamps();
        });
    }//up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::create('lecturers');
        
    }//down
}
