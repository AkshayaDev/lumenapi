<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('status');
            $table->string('address');           
            $table->string('typeofproperty');
            $table->string('number_of_bedrooms');
            $table->string('number_of_bathrooms');
            $table->string('number_of_flatmates');
            $table->string('internet_access');
            $table->string('parking');
            $table->string('room_details');         
            $table->text('description');
            $table->string('user_id',191)->unique();
            //$table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
