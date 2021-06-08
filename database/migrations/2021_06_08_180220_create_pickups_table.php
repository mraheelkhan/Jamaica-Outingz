<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickups', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('hotel_name')->nullable();
            $table->string('hotel_address')->nullable();
            $table->string('hotel_room')->nullable();
            $table->string('name_cruiseline')->nullable();
            $table->string('dock_location')->nullable();
            $table->string('airport')->nullable();
            $table->string('destination')->nullable();
            $table->string('pickup_date')->nullable();
            $table->string('pickup_time')->nullable();
            $table->integer('adults')->nullable();
            $table->integer('childrens')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('pickups');
    }
}
