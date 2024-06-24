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
        Schema::table('finance_pages', function (Blueprint $table) {
            $table->string('title_kz')->nullable();
            $table->text('text_kz')->nullable();
            $table->string('card1_title_kz')->nullable();
            $table->text('card1_text_kz')->nullable();
            $table->string('card2_title_kz')->nullable();
            $table->text('card2_text_kz')->nullable();
            $table->string('card3_title_kz')->nullable();
            $table->text('card3_text_kz')->nullable();
            $table->string('card4_title_kz')->nullable();
            $table->text('card4_text_kz')->nullable();
            $table->string('card5_title_kz')->nullable();
            $table->text('card5_text_kz')->nullable();
            $table->string('card5_subtitle_kz')->nullable();
            $table->string('card6_title_kz')->nullable();
            $table->text('card6_text_kz')->nullable();
            $table->string('card6_subtitle_kz')->nullable();
            $table->string('card7_title_kz')->nullable();
            $table->text('card7_text_kz')->nullable();
            $table->string('card7_subtitle_kz')->nullable();
            $table->string('card8_title_kz')->nullable();
            $table->text('card8_text_kz')->nullable();
            $table->string('card8_subtitle_kz')->nullable();
            $table->string('card9_title_kz')->nullable();
            $table->text('card9_text_kz')->nullable();
            $table->string('card9_subtitle_kz')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('finance_pages', function (Blueprint $table) {
            //
        });
    }
};
