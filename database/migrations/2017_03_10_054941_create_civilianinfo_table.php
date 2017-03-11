<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCivilianinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('civilian_info', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('SHistoryId')->unsigned();
            $table->integer('ACPositionId')->unsigned();
            $table->integer('ACSectorId')->unsigned();
            $table->string('OfficeName', 45)->nullable();
            $table->text('OfficeAddress')->nullable();
            $table->timestamps();

            $table->foreign('ACPositionId')->references('id')->on('ac_positions');
            $table->foreign('ACSectorId')->references('id')->on('ac_sectors');
            $table->foreign('SHistoryId')->references('id')->on('stakeholder_history');

        });

        
    }//up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('civilian_info');
        
    }//down
}
