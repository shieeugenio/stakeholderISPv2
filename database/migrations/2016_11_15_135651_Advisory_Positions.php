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
            $table->string('acpositioncode', 10);
            $table->string('desc', 60)->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('AdvisoryPositions');
    }
}
