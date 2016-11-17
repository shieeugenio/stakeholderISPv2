<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ACSubcategory extends Migration
{
    public function up()
    {
        Schema::create('ACSubcategory', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->string('subcategoryname', 45);
            $table->integer('categoryId')->unsigned();
            $table->foreign('categoryId')->references('ID')->on('ACCategory');
        });
    }
    public function down()
    {
        Schema::drop('ACSubcategory');
    }
}
