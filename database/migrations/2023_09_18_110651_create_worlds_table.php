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
        Schema::create('worlds', function (Blueprint $table) {
            //worldcategory_id, title, title_kz, year, description, description_kz, image, created_at, updated_at
            $table->id();
            $table->unsignedBigInteger('worldcategory_id');
            $table->string('title');
            $table->string('title_kz');
            $table->integer('year')->nullable();
            $table->string('description');
            $table->string('description_kz');
            $table->string('image');
            $table->foreign('worldcategory_id')->references('id')->on('world_categories')->onDelete('cascade');
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
        Schema::dropIfExists('worlds');
    }
};
