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
        Schema::create('rnds', function (Blueprint $table) {
            $table->id();
            //section1, section2,  section3_image, section3_banner, section3_text
            $table->longText('section1')->nullable();
            $table->longText('section2')->nullable();
            $table->string('section3_image')->nullable();
            $table->string('section3_banner')->nullable();
            $table->longText('section3_text')->nullable();
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
        Schema::dropIfExists('rnds');
    }
};
