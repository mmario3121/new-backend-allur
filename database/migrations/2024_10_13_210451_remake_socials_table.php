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
        //drop old table
        Schema::dropIfExists('socials');
        //create new table
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_kz');
            $table->string('image');
            $table->text('text');
            $table->text('text_kz');
            $table->string('type')->default('charity');
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
        //drop new table
        Schema::dropIfExists('socials');
        //create old table
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('text');
            $table->string('type')->default('charity');
            $table->timestamps();
        });
    }
};
