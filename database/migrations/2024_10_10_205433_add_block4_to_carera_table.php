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
            $table->string('block4_title')->nullable();
            $table->text('block4_text')->nullable();
            $table->string('block4_image')->nullable();
            $table->string('block4_title_kz')->nullable();
            $table->text('block4_text_kz')->nullable();
            $table->string('block5_image')->nullable();
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
            $table->dropColumn('block4_title');
            $table->dropColumn('block4_text');
            $table->dropColumn('block4_image');
            $table->dropColumn('block4_title_kz');
            $table->dropColumn('block4_text_kz');
            $table->dropColumn('block5_image');
        });
    }
};
