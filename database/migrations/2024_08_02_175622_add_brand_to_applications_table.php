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
        Schema::table('applications', function (Blueprint $table) {
            //
            $table->string('brand')->nullable();
            //drop $table->foreignId('city_id')->nullable()->constrained('cities')->nullOnDelete();
            $table->dropForeign(['city_id']);
            $table->dropColumn('city_id');
            $table->string('city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            //
            $table->dropColumn('brand');
            $table->foreignId('city_id')->nullable()->constrained('cities')->nullOnDelete();
            $table->dropColumn('city');
        });
    }
};
