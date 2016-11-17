<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdvisoryPositions extends Migration
{
    public function up()
    {
        Schema::create('AdvisoryPositions', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->string('acpositionname', 45);
        });
    }

    public function down()
    {
        Schema::drop('AdvisoryPositions');
    }
}
