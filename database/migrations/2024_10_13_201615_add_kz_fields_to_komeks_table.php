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
            $table->json('services_kz')->nullable();
            $table->string('card1_kz')->nullable();
            $table->string('card2_kz')->nullable();
            $table->string('card3_kz')->nullable();
            $table->string('card4_kz')->nullable();
            $table->string('card5_kz')->nullable();
            $table->string('card6_kz')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('subtitle_kz')->nullable();
            $table->string('annotation')->nullable();
            $table->string('annotation_kz')->nullable();
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
            $table->dropColumn('services_kz');
            $table->dropColumn('card1_kz');
            $table->dropColumn('card2_kz');
            $table->dropColumn('card3_kz');
            $table->dropColumn('card4_kz');
            $table->dropColumn('card5_kz');
            $table->dropColumn('card6_kz');
            $table->dropColumn('subtitle');
            $table->dropColumn('subtitle_kz');
            $table->dropColumn('annotation');
            $table->dropColumn('annotation_kz');
        });
    }
};
