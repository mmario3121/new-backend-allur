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
        Schema::create('world_categories', function (Blueprint $table) {
            $table->id();
            //image, title, slug
            $table->string('image')->nullable();
            $table->string('image_mob')->nullable();
            $table->string('title');
            $table->string('title_kz');
            $table->string('slug');
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
        Schema::dropIfExists('world_categories');
    }
};
