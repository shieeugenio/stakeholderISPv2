<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitofficetertiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('unit_office_tertiaries', function(Blueprint $table){
            $table->increments('id');
            $table->string('UnitOfficeTertiaryName', 45)->unique();
            $table->string('UnitOfficeHasQuaternary', 45);
            $table->integer('UnitOfficeSecondaryID')->unsigned();
            $table->foreign('UnitOfficeSecondaryID')->references('id')->on('unit_office_secondaries');
            $table->text('Description')->nullable();
            $table->timestamps();

        });
    }//up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('unit_office_tertiaries');
        
    }//down
}
