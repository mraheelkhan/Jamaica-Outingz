<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTableUniqueExperiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unique_experiences', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->dropColumn('unique_experience_name');

            $table->string('title')->after('id')->nullable();
            $table->string('location')->after('title')->nullable();
            $table->string('duration')->after('location')->nullable();
            $table->integer('cost')->after('duration')->nullable();
            $table->integer('stars')->after('guide_info')->nullable();
            $table->string('cover_image')->after('stars')->default('default.jpg');
            $table->integer('no_of_reviews')->after('cover_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unique_experiences', function (Blueprint $table) {
            $table->string('category')->nullable();
            $table->string('unique_experience_name')->nullable();

            $table->dropColumn('title');
            $table->dropColumn('location');
            $table->dropColumn('duration');
            $table->dropColumn('cost');
            $table->dropColumn('stars');
            $table->dropColumn('cover_image');
            $table->dropColumn('no_of_reviews');
        });
    }
}
