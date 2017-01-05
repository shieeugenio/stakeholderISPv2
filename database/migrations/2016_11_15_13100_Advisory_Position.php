<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdvisoryPosition extends Migration
{
    public function up()
    {
        Schema::create('Advisory_Position', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->string('acpositionname', 45)->unique();
            $table->string('desc', 60)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('Advisory_Position');
    }
}
