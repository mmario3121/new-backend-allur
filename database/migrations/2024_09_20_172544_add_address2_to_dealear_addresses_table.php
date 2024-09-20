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
        Schema::table('dealear_addresses', function (Blueprint $table) {
            $table->string('address2')->nullable()->after('address');
            $table->string('address2_kz')->nullable()->after('address_kz');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dealear_addresses', function (Blueprint $table) {
            $table->dropColumn('address2');
            $table->dropColumn('address2_kz');
        });
    }
};
