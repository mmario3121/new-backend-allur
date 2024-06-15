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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('surname');
            $table->string('phone');
            $table->unsignedBigInteger('city_id');
            $table->string('address');
            $table->string('gender');
            $table->date('birth_date');
            $table->string('iin');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_subscribed')->default(true);
            $table->boolean('is_notified')->default(true);
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
        Schema::dropIfExists('customers');
    }
};
