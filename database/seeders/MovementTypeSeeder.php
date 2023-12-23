<?php

namespace Database\Seeders;

use App\Models\MovementType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovementTypeSeeder extends Seeder
{

    const DEFAULT_MOVEMENT_TYPES = [
        [
            'alias' => 'city_with_traffic_jams',
            'name' => 'Місто з пробками',
        ],
        [
            'alias' => 'city',
            'name' => 'Місто',
        ],
        [
            'alias' => 'track',
            'name' => 'Траса',
        ],
        [
            'alias' => 'city_and_highway',
            'name' => 'Місто та траса',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::DEFAULT_MOVEMENT_TYPES as $movementType) {
            MovementType::create($movementType);
        }
    }
}
