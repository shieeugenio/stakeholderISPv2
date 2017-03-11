<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitofficequaternaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('unit_office_quaternaries', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->string('UnitOfficeQuaternaryName', 45)->unique();
            $table->integer('UnitOfficeTertiaryID')->unsigned();
            $table->text('Description')->nullable();
            $table->timestamps();

            $table->foreign('UnitOfficeTertiaryID')->references('id')->on('unit_office_tertiaries');

        });
        
    }//up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('unit_office_quaternaries');
        
    }//down
}
