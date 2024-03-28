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
        Schema::table('model_section_items', function (Blueprint $table) {
            $table->string('title');
            $table->string('title_kz');
            $table->string('text');
            $table->string('text_kz');
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('model_section_items', function (Blueprint $table) {
            //
        });
    }
};
