<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Advisers extends Migration
{
    public function up()
{

    Schema::create('Advisers', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->string('fname', 45);
            $table->string('mname', 45);
            $table->string('lname', 45);
            $table->string('street', 45);
            $table->string('barangay', 45);
            $table->string('city', 45);
            $table->string('province', 45);
            $table->string('email');
            $table->date('birthdate');
            $table->tinyInteger('category');
            $table->tinyInteger('occupationstat');
            $table->string('imagepath');
        });
}

    public function down()
    {
        Schema::drop('Advisers');
    }
}
