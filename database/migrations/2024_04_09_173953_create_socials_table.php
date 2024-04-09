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
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            //4 blocks with title, image, text
            $table->string('block1_title')->nullable();
            $table->string('block1_image')->nullable();
            $table->text('block1_text')->nullable();
            $table->string('block2_title')->nullable();
            $table->string('block2_image')->nullable();
            $table->text('block2_text')->nullable();
            $table->string('block3_title')->nullable();
            $table->string('block3_image')->nullable();
            $table->text('block3_text')->nullable();
            $table->string('block4_title')->nullable();
            $table->string('block4_image')->nullable();
            $table->text('block4_text')->nullable();
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
        Schema::dropIfExists('socials');
    }
};
