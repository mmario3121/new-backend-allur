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
        Schema::create('careras', function (Blueprint $table) {
            $table->id();
            //block1 title, image, text
            $table->string('block1_title')->nullable();
            $table->string('block1_image')->nullable();
            $table->text('block1_text')->nullable();
            //block2 title, image, text
            $table->string('block2_title')->nullable();
            $table->string('block2_image')->nullable();
            $table->text('block2_text')->nullable();
            //block3 image
            $table->string('block3_image')->nullable();
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
        Schema::dropIfExists('careras');
    }
};
