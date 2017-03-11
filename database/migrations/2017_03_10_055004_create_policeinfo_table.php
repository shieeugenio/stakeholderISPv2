<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliceinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('police_info', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('SHistoryId')->unsigned();
            $table->integer('PNPPositionId')->unsigned();
            $table->integer('RankId')->unsigned();
            $table->text('AuthorityOrder');
            $table->tinyInteger('PoliceType');
            $table->timestamps();

            $table->foreign('PNPPositionId')->references('id')->on('pnp_positions');
            $table->foreign('RankId')->references('id')->on('ranks');
            $table->foreign('SHistoryId')->references('id')->on('stakeholder_history');

        });
    }//up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        
        Schema::drop('police_info');
    }//down
}
