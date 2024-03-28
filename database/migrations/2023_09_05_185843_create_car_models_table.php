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
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('car_types')->cascadeOnDelete();
            $table->string('slug');
            $table->string('title');
            $table->string('title_kz');
            $table->string('logo')->nullable();
            $table->string('video')->nullable();
            $table->string('price_list')->nullable();
            $table->string('document')->nullable();
            $table->string('bitrix_id')->nullable();
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
        Schema::dropIfExists('car_models');
    }
};
