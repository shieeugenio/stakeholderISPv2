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
            $table->tinyInteger('gender');
            $table->string('contactno', 15);
            $table->string('landline', 15)->nullable();
            $table->string('street', 45);
            $table->string('barangay', 45);
            $table->string('city', 45);
            $table->string('province', 45);
            $table->string('email', 65);
            $table->date('startdate');
            $table->date('enddate')->nullable();
            $table->string('fbuser', 20)->nullable();
            $table->string('twitteruser', 20)->nullable();
            $table->string('iguser', 20)->nullable();
            $table->date('birthdate');
            $table->tinyInteger('category');
            $table->tinyInteger('occupationstat');
            $table->text('imagepath');

        });
}

    public function down()
    {
        Schema::drop('Advisers');
    }
}
