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
        Schema::table('model_colors', function (Blueprint $table) {
            $table->dropColumn('logo');
            $table->string('title')->nullable();
            $table->string('title_kz')->nullable();
            $table->string('hex')->nullable();
            $table->string('bitrix_id')->nullable();
            $table->integer('position')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
