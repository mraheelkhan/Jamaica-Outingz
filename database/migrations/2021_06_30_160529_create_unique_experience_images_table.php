<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniqueExperienceImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unique_experience_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unique_experience_id');
            $table->string('image');

            $table->foreign('unique_experience_id')->references('id')->on('unique_experiences')->onDelete('cascade');
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
        Schema::dropIfExists('unique_experience_images');
    }
}
