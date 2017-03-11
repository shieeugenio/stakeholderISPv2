<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcpositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ac_positions', function(Blueprint $table) {
            $table->increments('id');
            $table->string('ACPositionName', 45)->unique();
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
        Schema::drop('ac_positions');
        
    }//down
}
