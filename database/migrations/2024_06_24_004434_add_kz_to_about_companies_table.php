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
            //block1 - title, text, image
            //block2 - title, text, image
            //block3 - title, text, image, card1, card2
            //block4 - title, text, image
            //block5 - title, text, image
            //block6 - title, text, image
            //kz fields
            $table->string('block1_title_kz')->nullable();
            $table->text('block1_text_kz')->nullable();
            $table->string('block2_title_kz')->nullable();
            $table->text('block2_text_kz')->nullable();
            $table->string('block3_title_kz')->nullable();
            $table->text('block3_text_kz')->nullable();
            $table->string('block4_title_kz')->nullable();
            $table->text('block4_text_kz')->nullable();
            $table->string('block5_title_kz')->nullable();
            $table->text('block5_text_kz')->nullable();
            $table->string('block6_title_kz')->nullable();
            $table->text('block6_text_kz')->nullable();
            $table->string('block3_card1_kz')->nullable();
            $table->string('block3_card2_kz')->nullable();
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
