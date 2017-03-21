<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStakeholderhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
       Schema::create('stakeholder_history', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->foreign('SProfileId')->references('id')->on('stakeholder_profile');
            $table->date('StartDate');
            $table->date('EndDate')->nullable();
            $table->tinyInteger('Type');
            $table->integer('SecondaryOfficeId')->unsigned();
            $table->integer('TertiaryOfficeId')->unsigned();
            $table->integer('QuaternaryOfficeId')->unsigned();
            $table->integer('SProfileId')->unsigned();
            $table->timestamps();
             
            $table->foreign('SecondaryOfficeId')->references('id')->on('unit_office_secondaries');
            $table->foreign('TertiaryOfficeId')->references('id')->on('unit_office_tertiaries');
            $table->foreign('QuaternaryOfficeId')->references('id')->on('unit_office_quaternaries');

       });
    }//up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('stakeholder_history');
        
    }//down
}
