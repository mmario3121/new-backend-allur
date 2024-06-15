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
        Schema::table('specs', function (Blueprint $table) {
            //remove model_id, add complectation_id
            // $table->dropForeign('specs_model_id_foreign');
            $table->dropColumn('model_id');
            $table->unsignedBigInteger('complectation_id');
            // $table->foreign('complectation_id')->references('id')->on('model_complectations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specs', function (Blueprint $table) {
            //
            // $table->dropForeign('specs_complectation_id_foreign');
            $table->dropColumn('complectation_id');
            $table->unsignedBigInteger('model_id');
            // $table->foreign('model_id')->references('id')->on('car_models')->onDelete('cascade');
        });
    }
};
