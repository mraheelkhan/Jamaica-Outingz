<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('sku')->nullable()->after('category_id');
            $table->string('sizes')->nullable()->after('price');
            $table->string('materials')->nullable()->after('sizes');
            $table->string('colors')->nullable()->after('materials');
            $table->string('fittings')->nullable()->after('colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('sku');
            $table->dropColumn('sizes');
            $table->dropColumn('materials');
            $table->dropColumn('colors');
            $table->dropColumn('fittings');
        });
    }
}
