<?php

namespace App\Services\FuelType;

use App\Eloquent\FuelType\FuelTypeEloquent;
use App\Eloquent\GasStation\GasStationEloquent;
use App\Models\FuelType;
use Database\Seeders\FuelTypeSeeder;
use Illuminate\Database\Eloquent\Collection;

class FuelTypeService
{
    /**
     * @return Collection|FuelType[]
     */
    public function list(?string $gasStationAlias): Collection
    {
        $ft = FuelTypeEloquent::searchStart();
        $ft = FuelTypeEloquent::searchByGasStationAlias($ft, $gasStationAlias);
        $ft = FuelTypeEloquent::searchByGasStationAliasNull($ft);

        return $ft->get();
    }
}
