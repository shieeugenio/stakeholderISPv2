<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStakeholderprofileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('stakeholder_profile', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('FirstName', 45);
            $table->string('MiddleName', 45)->nullable();
            $table->string('LastName', 45);
            $table->string('Qualifier', 45)->nullable();
            $table->tinyInteger('Gender');
            $table->string('ContactNo', 13)->nullable();
            $table->string('Landline', 13)->nullable();
            $table->text('EmailAddress')->nullable();
            $table->string('Street', 45)->nullable();
            $table->string('City', 45)->nullable();
            $table->string('Barangay', 45)->nullable();
            $table->string('Province', 45)->nullable();
            $table->string('Facebook', 45)->nullable();
            $table->string('Twitter', 45)->nullable();
            $table->string('Instagram', 45)->nullable();
            $table->date('Birthdate', 45);
            $table->text('ImagePath')->nullable();
            $table->timestamps();
        });
    }//up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stakeholder_profile');
    }//down
}
