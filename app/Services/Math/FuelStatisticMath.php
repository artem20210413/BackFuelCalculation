<?php

namespace App\Services\Math;

use App\Models\FuelStatistic;

class FuelStatisticMath
{

    static function fuelConsumption(?FuelStatistic $fs): float
    {
        if (!$fs) return 0.0;

        return $fs->volume / $fs->distance * 100;
    }

    static function pricePerLiter(?FuelStatistic $fs): float
    {
        if (!$fs) return 0.0;

        return $fs->refill_amount / $fs->volume;
    }

}
