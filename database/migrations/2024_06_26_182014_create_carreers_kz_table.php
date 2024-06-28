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
        Schema::create('carreers_kz', function (Blueprint $table) {
            $table->id();
            // 10 blocks with image, title, description for kz
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
            $table->string('block7_title_kz')->nullable();
            $table->text('block7_text_kz')->nullable();
            $table->string('block8_title_kz')->nullable();
            $table->text('block8_text_kz')->nullable();
            $table->string('block9_title_kz')->nullable();
            $table->text('block9_text_kz')->nullable();
            $table->string('block10_title_kz')->nullable();
            $table->text('block10_text_kz')->nullable();
            // 4 cards for kz
            $table->string('card1_title_kz')->nullable();
            $table->text('card1_text_kz')->nullable();
            $table->string('card2_title_kz')->nullable();
            $table->text('card2_text_kz')->nullable();
            $table->string('card3_title_kz')->nullable();
            $table->text('card3_text_kz')->nullable();
            $table->string('card4_title_kz')->nullable();
            $table->text('card4_text_kz')->nullable();
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
        Schema::dropIfExists('carreers_kz');
    }
};
