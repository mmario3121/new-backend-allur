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
        Schema::create('main_pages', function (Blueprint $table) {
            $table->id();
            $table->string('video')->nullable();
            $table->string('finance_photo')->nullable();
            $table->string('career_title')->nullable();
            $table->string('career_title_kz')->nullable();
            $table->text('career_text')->nullable();
            $table->text('career_text_kz')->nullable();
            $table->string('career_photo1')->nullable();
            $table->string('career_photo2')->nullable();
            $table->string('career_photo3')->nullable();
            $table->string('consultation_photo')->nullable();
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
        Schema::dropIfExists('main_pages');
    }
};
