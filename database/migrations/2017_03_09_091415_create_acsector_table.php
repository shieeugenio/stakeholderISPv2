<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcsectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('ac_sectors', function(Blueprint $table){
            $table->increments('id');
            $table->string('ACSectorName', 45)->unique();
            $table->string('Description', 60)->nullable();
            $table->timestamps();
        });
    }//up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('ac_sectors');
        
    }//down
}
