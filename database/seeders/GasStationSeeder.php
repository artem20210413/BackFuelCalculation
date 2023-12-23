<?php

namespace Database\Seeders;

use App\Models\GasStation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GasStationSeeder extends Seeder
{

    const DEFAULT_GAS_STATIONS = [
        [
            'alias' => 'wog',
            'name' => 'WOG',
        ],
        [
            'alias' => 'shell',
            'name' => 'Shell',
        ],
    ];



    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::DEFAULT_GAS_STATIONS as $gasStation) {
            GasStation::create($gasStation);
        }
    }
}
