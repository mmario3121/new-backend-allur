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
        Schema::create('specification_categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('model_id')->constrained('car_models')->nullOnDelete();
            $table->string('title');
            $table->string('title_kz');
            $table->integer('position')->default(1);
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
        Schema::dropIfExists('specification_categories');
    }
};
