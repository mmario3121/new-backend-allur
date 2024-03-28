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
        Schema::table('specifications', function (Blueprint $table) {
            $table->string('title_kz');
            $table->string('value');
            $table->string('value_kz');
            $table->integer('position')->default(0);
            $table->bigInteger('specification_category_id')->constrained('specification_categories')->nullOnDelete();
            $table->bigInteger('complectation_id')->constrained('complectations')->nullOnDelete();
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
