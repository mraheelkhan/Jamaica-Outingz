<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangesInPickups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pickups', function (Blueprint $table) {
            $table->dropColumn('hotel_room')->nullable();
            $table->dropColumn('name_cruiseline')->nullable();
            $table->dropColumn('dock_location')->nullable();
            $table->dropColumn('airport')->nullable();
            $table->string('booking_date')->after('destination')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pickups', function (Blueprint $table) {
            $table->string('hotel_room')->nullable();
            $table->string('name_cruiseline')->nullable();
            $table->string('dock_location')->nullable();
            $table->string('airport')->nullable();
            $table->dropColumn('booking_date')->nullable();
        });
    }
}
