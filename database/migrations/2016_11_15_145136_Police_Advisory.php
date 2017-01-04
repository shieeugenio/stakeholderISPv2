<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PoliceAdvisory extends Migration
{
    public function up()
    {
        Schema::create('Police_Advisory', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->string('fname', 45);
            $table->string('mname', 45)->nullable();
            $table->string('lname', 45);
            $table->string('qualifier', 45);
            $table->string('assign', 45);
            $table->string('contactno', 15);
            $table->string('email', 65);
            $table->string('authorityorder', 20)->unique();
            $table->text('imagepath');
            $table->integer('rank_id')->unsigned();
            $table->foreign('rank_id')->references('id')->on('ranks');
            $table->integer('police_position_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->foreign('police_position_id')->references('id')->on('Police_Position');
            $table->foreign('unit_id')->references('id')->on('unit_offices');
        });
    }

    public function down()
    {
        Schema::drop('Police_Advisory');
    }
}
