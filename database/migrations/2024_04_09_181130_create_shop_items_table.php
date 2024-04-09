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
        Schema::create('shop_items', function (Blueprint $table) {
            $table->id();
            //title, article, color, size, price, description, image, category, parent
            $table->string('title');
            $table->string('article');
            $table->string('color');
            $table->string('size');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->string('image');
            $table->string('category');
            $table->bigInteger('shop_item_id')->nullable();
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
        Schema::dropIfExists('shop_items');
    }
};
