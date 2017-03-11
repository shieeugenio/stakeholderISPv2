<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitofficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('unit_offices', function(Blueprint $table){
            $table->increments('id');
            $table->string('UnitOfficeName', 45)->unique();
            $table->string('UnitOfficeHasField', 45);
            $table->text('Description')->nullable();
            $table->timestamps();
        });
    }//up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('unit_offices');
        
    }//down
}
