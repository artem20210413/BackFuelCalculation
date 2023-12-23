<?php

namespace App\Services\MovementType;

use App\Eloquent\GasStation\GasStationEloquent;
use App\Eloquent\MovementType\MovementTypeEloquent;
use App\Models\MovementType;
use Illuminate\Database\Eloquent\Collection;

class MovementTypeService
{
    /**
     * @return Collection|MovementType[]
     */
    public function list():Collection
    {
        return MovementTypeEloquent::all();
    }
}
