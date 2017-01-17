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
            $table->tinyInteger('policetype');
            $table->string('authorityorder', 20)->unique();
            $table->text('imagepath');
            $table->integer('rank_id')->unsigned();
            $table->foreign('rank_id')->references('id')->on('ranks');
            $table->integer('police_position_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->integer('second_id')->unsigned();
            $table->integer('tertiary_id')->unsigned();
            $table->integer('quaternary_id')->unsigned();
            $table->foreign('police_position_id')->references('id')->on('Police_Position');
            $table->foreign('unit_id')->references('id')->on('unit_offices');
            $table->foreign('second_id')->references('id')->on('unit_office_secondaries');
            $table->foreign('tertiary_id')->references('id')->on('unit_office_tertiaries');
            $table->foreign('quaternary_id')->references('id')->on('unit_office_quaternaries');

        });
    }

    public function down()
    {
        Schema::drop('Police_Advisory');
    }
}
