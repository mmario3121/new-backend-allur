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
        Schema::table('finance_pages', function (Blueprint $table) {
            $table->json('mini_card_5')->nullable();
            $table->json('mini_card_6')->nullable();
            $table->json('mini_card_7')->nullable();
            $table->json('mini_card_8')->nullable();
            $table->json('mini_card_9')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('finance_pages', function (Blueprint $table) {
            $table->dropColumn('mini_card_5');
            $table->dropColumn('mini_card_6');
            $table->dropColumn('mini_card_7');
            $table->dropColumn('mini_card_8');
            $table->dropColumn('mini_card_9');
        });
    }
};
