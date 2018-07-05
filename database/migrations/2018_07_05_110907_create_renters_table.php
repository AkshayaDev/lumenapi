<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accommodation_for');
            $table->text('accommodation_wanted_applicants');
            $table->string('teamup');
            $table->string('where_to_live');
            $table->string('max_budget');
            $table->string('move_date');
            $table->string('preferred_length_of_stay');
            $table->text('about_renter');
            $table->text('renter_description');
            $table->text('roommate_preferences');
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
        Schema::dropIfExists('renters');
    }
}
