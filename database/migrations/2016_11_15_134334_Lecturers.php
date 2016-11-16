<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lecturers extends Migration
{
    public function up()
    {
        Schema::create('Lecturers', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->string('fname', 45);
            $table->string('mname', 45);
            $table->string('lname', 45);
        });
    }

    public function down()
    {
        Schema::drop('Lecturers');
    }
}
