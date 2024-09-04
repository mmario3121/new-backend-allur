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
        Schema::table('about_companies', function (Blueprint $table) {
            $table->string('block7_title')->nullable();
            $table->text('block7_title_kz')->nullable();
            $table->text('block7_text')->nullable();
            $table->text('block7_text_kz')->nullable();
            $table->string('block7_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_companies', function (Blueprint $table) {
            //
        });
    }
};
