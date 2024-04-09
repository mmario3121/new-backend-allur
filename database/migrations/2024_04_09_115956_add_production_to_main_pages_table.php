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
        Schema::table('main_pages', function (Blueprint $table) {
            //production_title, production_description, production_image, production_subtitle
            $table->string('production_title')->nullable();
            $table->text('production_description')->nullable();
            $table->string('production_image')->nullable();
            $table->string('production_subtitle')->nullable();
            $table->string('production_title_kz')->nullable();
            $table->text('production_description_kz')->nullable();
            $table->string('production_subtitle_kz')->nullable();
            $table->string('finance_title')->nullable();
            $table->string('finance_title_kz')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_pages', function (Blueprint $table) {
            //
        });
    }
};
