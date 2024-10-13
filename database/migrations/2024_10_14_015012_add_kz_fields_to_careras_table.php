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
        Schema::table('careras', function (Blueprint $table) {
            $table->string('block1_title_kz')->nullable();
            $table->string('block1_text_kz')->nullable();
            $table->string('block2_title_kz')->nullable();
            $table->string('block2_text_kz')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('careras', function (Blueprint $table) {
            $table->dropColumn('block1_title_kz');
            $table->dropColumn('block1_text_kz');
            $table->dropColumn('block2_title_kz');
            $table->dropColumn('block2_text_kz');
        });
    }
};
