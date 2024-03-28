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
        Schema::create('komeks', function (Blueprint $table) {
            $table->id();
            //title, title_kz, text, text_kz, image, form_image
            $table->string('title');
            $table->string('title_kz');
            $table->text('text');
            $table->text('text_kz');
            $table->string('image');
            $table->string('form_image');
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
        Schema::dropIfExists('komeks');
    }
};
