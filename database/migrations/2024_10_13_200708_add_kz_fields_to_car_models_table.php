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
            $table->string('price_list_kz')->nullable();
            $table->string('document_kz')->nullable();
            $table->string('char1_title_kz')->nullable();
            $table->string('char1_value_kz')->nullable();
            $table->string('char2_title_kz')->nullable();
            $table->string('char2_value_kz')->nullable();
            $table->string('char3_title_kz')->nullable();
            $table->string('char3_value_kz')->nullable();
            $table->string('char4_title_kz')->nullable();
            $table->string('char4_value_kz')->nullable();
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
            $table->dropColumn('price_list_kz');
            $table->dropColumn('document_kz');
            $table->dropColumn('char1_title_kz');
            $table->dropColumn('char1_value_kz');
            $table->dropColumn('char2_title_kz');
            $table->dropColumn('char2_value_kz');
            $table->dropColumn('char3_title_kz');
            $table->dropColumn('char3_value_kz');
            $table->dropColumn('char4_title_kz');
            $table->dropColumn('char4_value_kz');
        });
    }
};
