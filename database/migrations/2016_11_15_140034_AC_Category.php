<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ACCategory extends Migration
{
    public function up()
    {
        Schema::create('AC_Category', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->string('accategorycode', 10)->nullable();
            $table->string('categoryname', 45)->unique();
            $table->string('desc', 60)->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('AC_Category');
    }
}
