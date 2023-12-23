<?php

use Database\Seeders\FuelTypeSeeder;
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
        Schema::create('fuel_types', function (Blueprint $table) {
            $table->id();
            $table->string('alias', 191)->unique();
            $table->string('name', 512);
            $table->string('gas_station_alias', 191)->nullable();

            $table->foreign('gas_station_alias')->references('alias')->on('gas_stations')->onDelete('restrict');
        });

        (new FuelTypeSeeder())->run();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_types');
    }
};
