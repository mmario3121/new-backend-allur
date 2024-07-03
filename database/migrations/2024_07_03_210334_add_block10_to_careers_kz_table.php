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
        Schema::table('carreers_kz', function (Blueprint $table) {
            //
            $table->string('block11_title_kz')->nullable();
            $table->text('block11_text_kz')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('careers_kz', function (Blueprint $table) {
            //
        });
    }
};
