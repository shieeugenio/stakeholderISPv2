<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitofficesecondaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('unit_office_secondaries', function(Blueprint $table){
            $table->increments('id');
            $table->string('UnitOfficeSecondaryName', 45)->unique();
            $table->string('UnitOfficeHasTertiary', 45);
            $table->integer('UnitOfficeID')->unsigned();
            $table->foreign('UnitOfficeID')->references('id')->on('unit_offices');
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
        Schema::create('unit_office_secondaries');
    }//down
}
