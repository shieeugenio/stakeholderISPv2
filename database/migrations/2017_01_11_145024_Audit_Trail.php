<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AuditTrail extends Migration
{

    public function up()
    {
        Schema::create('Audit_Trail', function(Blueprint $table){
            $table->increments('id');
            $table->dateTime('date_time');
            $table->string('description');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        )};
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Audit_Trail');
    }
}
