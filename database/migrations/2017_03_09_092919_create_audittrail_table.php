<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudittrailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('audit_trail', function(Blueprint $table) {
            $table->increments('id');
            $table->dateTime('DateTime');
            $table->text('Description');
            $table->integer('UserId')->unsigned();
            $table->foreign('UserId')->references('id')->on('users');
        });
    }//up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('audit_trail');
        
    }//down
}
