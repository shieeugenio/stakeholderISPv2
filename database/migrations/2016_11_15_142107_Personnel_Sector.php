<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonnelSector extends Migration
{
    public function up()
    {
        Schema::create('PersonnelSector', function(Blueprint $table)
        {
            $table->primary(array('advisory_council_id', 'ac_sector_id'));
            $table->integer('advisory_council_id')->unsigned();
            $table->integer('ac_sector_id')->unsigned();
            $table->foreign('advisory_council_id')->references('ID')->on('AdvisoryCouncil');
            $table->foreign('ac_sector_id')->references('ID')->on('ACSectors');
        });
    }
    public function down()
    {
        Schema::drop('PersonnelSector');
    }
}
