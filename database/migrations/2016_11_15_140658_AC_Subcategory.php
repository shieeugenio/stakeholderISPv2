<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ACSubcategory extends Migration
{
    public function up()
    {
        Schema::create('AC_Subcategory', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->string('subcategoryname', 45)->unique();
            $table->string('desc', 60)->nullable();
            $table->timestamps();
            $table->integer('categoryId')->unsigned();
            $table->foreign('categoryId')->references('ID')->on('AC_Category');
        });
    }
    public function down()
    {
        Schema::drop('AC_Subcategory');
    }
}
