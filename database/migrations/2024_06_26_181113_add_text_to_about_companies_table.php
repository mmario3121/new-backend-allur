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
        Schema::table('about_companies', function (Blueprint $table) {
            //block3_card1_text, block3_card2_text, block3_card1_text_kz, block3_card2_text_kz
            $table->string('block3_card1_text')->nullable();
            $table->string('block3_card2_text')->nullable();
            $table->string('block3_card1_text_kz')->nullable();
            $table->string('block3_card2_text_kz')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_companies', function (Blueprint $table) {
            //
        });
    }
};
