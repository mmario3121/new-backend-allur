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
        Schema::create('finance_pages', function (Blueprint $table) {
            $table->id();
            //title, image, text,
            //card1 - card4 - title, text
            //card5 - card9 - title, text, subtitle
            //block2_image
            //everything is nullable
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->text('text')->nullable();
            $table->string('card1_title')->nullable();
            $table->text('card1_text')->nullable();
            $table->string('card2_title')->nullable();
            $table->text('card2_text')->nullable();
            $table->string('card3_title')->nullable();
            $table->text('card3_text')->nullable();
            $table->string('card4_title')->nullable();
            $table->text('card4_text')->nullable();
            $table->string('card5_title')->nullable();
            $table->text('card5_text')->nullable();
            $table->string('card5_subtitle')->nullable();
            $table->string('card6_title')->nullable();
            $table->text('card6_text')->nullable();
            $table->string('card6_subtitle')->nullable();
            $table->string('card7_title')->nullable();
            $table->text('card7_text')->nullable();
            $table->string('card7_subtitle')->nullable();
            $table->string('card8_title')->nullable();
            $table->text('card8_text')->nullable();
            $table->string('card8_subtitle')->nullable();
            $table->string('card9_title')->nullable();
            $table->text('card9_text')->nullable();
            $table->string('card9_subtitle')->nullable();
            $table->string('block2_image')->nullable();
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
        Schema::dropIfExists('finance_pages');
    }
};
