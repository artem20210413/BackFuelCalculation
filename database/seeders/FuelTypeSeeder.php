<?php

namespace Database\Seeders;

use App\Models\FuelType;
use Illuminate\Database\Seeder;

class FuelTypeSeeder extends Seeder
{

    const DEFAULT_FUEL_TYPES = [
        [
            'alias' => 'gas',
            'name' => 'газ',
        ],
        [
            'alias' => '95',
            'name' => '95',
        ],
        [
            'alias' => '92',
            'name' => '92',
        ],
        [
            'alias' => 'Mustang',
            'name' => 'Mustang (100)',
            'gas_station_alias' => 'wog',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::DEFAULT_FUEL_TYPES as $fuelType) {
            FuelType::create($fuelType);
        }
    }
}
