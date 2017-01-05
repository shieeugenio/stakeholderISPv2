<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ACSector extends Migration
{
    public function up()
    {
        Schema::create('AC_Sector', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->string('sectorcode', 10)->nullable();
            $table->string('sectorname', 45)->unique();
            $table->string('desc', 60)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('AC_Sector');
    }
}
