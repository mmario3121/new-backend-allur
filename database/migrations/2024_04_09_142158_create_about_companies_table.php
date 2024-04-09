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
        Schema::create('about_companies', function (Blueprint $table) {
            $table->id();
            //block1 - title, text, image
            //block2 - title, text, image
            //block3 - title, text, image, card1, card2
            //block4 - title, text, image
            //block5 - title, text, image
            //block6 - title, text, image
            $table->string('block1_title')->nullable();
            $table->text('block1_text')->nullable();
            $table->string('block1_image')->nullable();
            $table->string('block2_title')->nullable();
            $table->text('block2_text')->nullable();
            $table->string('block2_image')->nullable();
            $table->string('block3_title')->nullable();
            $table->text('block3_text')->nullable();
            $table->string('block3_image')->nullable();
            $table->string('block3_card1')->nullable();
            $table->string('block3_card2')->nullable();
            $table->string('block4_title')->nullable();
            $table->text('block4_text')->nullable();
            $table->string('block4_image')->nullable();
            $table->string('block5_title')->nullable();
            $table->text('block5_text')->nullable();
            $table->string('block5_image')->nullable();
            $table->string('block6_title')->nullable();
            $table->text('block6_text')->nullable();
            $table->string('block6_image')->nullable();
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
        Schema::dropIfExists('about_companies');
    }
};
