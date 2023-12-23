<?php

namespace App\Services\GasStation;

use App\Eloquent\GasStation\GasStationEloquent;

class GasStationService
{

    public function list()
    {
        return GasStationEloquent::all();
    }
}
