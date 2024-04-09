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
        Schema::create('carreers', function (Blueprint $table) {
            $table->id();
            //10 blocks with image, title, description
            //4 cards
            //nullable
            $table->string('block1_title')->nullable();
            $table->text('block1_text')->nullable();
            $table->string('block1_image')->nullable();
            $table->string('block2_title')->nullable();
            $table->text('block2_text')->nullable();
            $table->string('block2_image')->nullable();
            $table->string('block3_title')->nullable();
            $table->text('block3_text')->nullable();
            $table->string('block3_image')->nullable();
            $table->string('block4_title')->nullable();
            $table->text('block4_text')->nullable();
            $table->string('block4_image')->nullable();
            $table->string('block5_title')->nullable();
            $table->text('block5_text')->nullable();
            $table->string('block5_image')->nullable();
            $table->string('block6_title')->nullable();
            $table->text('block6_text')->nullable();
            $table->string('block6_image')->nullable();
            $table->string('block7_title')->nullable();
            $table->text('block7_text')->nullable();
            $table->string('block7_image')->nullable();
            $table->string('block8_title')->nullable();
            $table->text('block8_text')->nullable();
            $table->string('block8_image')->nullable();
            $table->string('block9_title')->nullable();
            $table->text('block9_text')->nullable();
            $table->string('block9_image')->nullable();
            $table->string('block10_title')->nullable();
            $table->text('block10_text')->nullable();
            $table->string('block10_image')->nullable();
            $table->string('card1_title')->nullable();
            $table->text('card1_text')->nullable();
            $table->string('card2_title')->nullable();
            $table->text('card2_text')->nullable();
            $table->string('card3_title')->nullable();
            $table->text('card3_text')->nullable();
            $table->string('card4_title')->nullable();
            $table->text('card4_text')->nullable();
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
        Schema::dropIfExists('carreers');
    }
};
