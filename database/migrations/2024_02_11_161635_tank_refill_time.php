<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('fuel_statistics', function (Blueprint $table) {
            $table->timestamp('tank_refill_time')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fuel_statistics', function (Blueprint $table) {
            $table->dropColumn('tank_refill_time');
        });
    }
};
