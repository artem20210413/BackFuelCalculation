<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fuel_statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->float('distance'); //відстань
            $table->float('volume'); //обсяг
            $table->float('temperature')->nullable(); //температура
            $table->string('fuel_type_alias', 191)->nullable(); //псевдонім типу палива
            $table->string('gas_station_alias', 191)->nullable(); //псевдонім АЗС
            $table->string('movement_type_alias', 191)->nullable(); //псевдонім типу руху
            $table->float('refill_amount')->nullable(); //сума поповнення
            $table->float('traffic_jam_percentage')->nullable(); //відсоток заторів
            $table->text('description')->nullable(); // опис
            $table->timestamps();

            $table->foreign('fuel_type_alias')->references('alias')->on('fuel_types')->onDelete('restrict');
            $table->foreign('gas_station_alias')->references('alias')->on('gas_stations')->onDelete('restrict');
            $table->foreign('movement_type_alias')->references('alias')->on('movement_types')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_statistics');
    }
};
