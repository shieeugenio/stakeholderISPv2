<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdvisoryCouncil extends Migration
{
    public function up()
    {
        Schema::create('AdvisoryCouncil', function(Blueprint $table)
        {
            $table->primary('ID');
            $table->string('officename', 45)->unique();
            $table->string('officeaddress', 45);
            $table->integer('advisory_position_id')->unsigned();
            $table->integer('subcategoryId')->unsigned();
            $table->integer('ID')->unsigned();
            $table->foreign('advisory_position_id')->references('ID')->on('AdvisoryPositions');
            $table->foreign('subcategoryId')->references('ID')->on('ACSubcategory');
            $table->foreign('ID')->references('ID')->on('Advisers');
        });
    }
    public function down()
    {
        Schema::drop('AdvisoryCouncil');
    }
}
