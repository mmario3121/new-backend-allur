<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_models', function (Blueprint $table) {
            //
            $table->string('char1_title')->nullable();
            $table->string('char1_value')->nullable();
            $table->string('char2_title')->nullable();
            $table->string('char2_value')->nullable();
            $table->string('char3_title')->nullable();
            $table->string('char3_value')->nullable();
            $table->string('char4_title')->nullable();
            $table->string('char4_value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_models', function (Blueprint $table) {
            //
            $table->dropColumn('char1_title');
            $table->dropColumn('char1_value');
            $table->dropColumn('char2_title');
            $table->dropColumn('char2_value');
            $table->dropColumn('char3_title');
            $table->dropColumn('char3_value');
            $table->dropColumn('char4_title');
            $table->dropColumn('char4_value');
        });
    }
};
