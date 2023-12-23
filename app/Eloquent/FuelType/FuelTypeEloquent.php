<?php

namespace App\Eloquent\FuelType;

use App\Eloquent\Eloquent;
use App\Models\FuelType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class FuelTypeEloquent extends Eloquent
{
    /**
     * @return Collection|FuelType[]
     */
    public static function all(): Collection
    {
        return FuelType::all();
    }

    /** *************************** START SEARCH *************************** */

    /**
     * @return FuelType
     */
    public static function searchStart(): Builder
    {
        return FuelType::query();
    }

    /**
     * @param Builder $model
     * @param string|null ...$gasStationAlias
     * @return Builder
     */
    public static function searchByGasStationAlias(Builder &$model, ?string ...$gasStationAlias): Builder
    {
        return $model->whereIn('gas_station_alias', $gasStationAlias);
    }

    public static function searchByGasStationAliasNull(Builder &$model): Builder
    {
        return $model->orWhereNull('gas_station_alias');
    }


    /** *************************** END SEARCH *************************** */

}
