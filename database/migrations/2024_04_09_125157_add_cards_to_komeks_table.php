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
        Schema::table('komeks', function (Blueprint $table) {
            //
            $table->string('card1')->nullable();
            $table->string('card2')->nullable();
            $table->string('card3')->nullable();
            $table->string('card4')->nullable();
            $table->string('card5')->nullable();
            $table->string('card6')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('komeks', function (Blueprint $table) {
            //
            $table->dropColumn('card1');
            $table->dropColumn('card2');
            $table->dropColumn('card3');
            $table->dropColumn('card4');
            $table->dropColumn('card5');
            $table->dropColumn('card6');
        });
    }
};
