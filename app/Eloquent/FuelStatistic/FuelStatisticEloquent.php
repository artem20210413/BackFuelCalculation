<?php

namespace App\Eloquent\FuelStatistic;

use App\Eloquent\Eloquent;
use App\Models\FuelStatistic;
use App\Services\FuelStatistic\FuelStatisticFilterDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Validation\ValidationException;

class FuelStatisticEloquent extends Eloquent
{
    /**
     * @param FuelStatisticDto $dto
     * @return FuelStatistic
     */
    public static function save(FuelStatisticDto $dto): FuelStatistic
    {
        $fuelS = $dto->getId() ? self::find($dto->getId()) : new FuelStatistic();

        if (!$fuelS || ($fuelS->user_id !== null && $fuelS->user_id !== $dto->getUser()->id)) {
            throw ValidationException::withMessages([
                'fuel_statistic' => ["Fuel statistic not found. ID: {$dto->getId()}"],
            ]);
        }

        $fuelS->user_id = $dto->getUser()->id;
        $fuelS->distance = $dto->getDistance() ?? $fuelS->distance;
        $fuelS->volume = $dto->getVolume() ?? $fuelS->volume;
        $fuelS->fuel_type_alias = $dto->getFuelTypeAlias() ?? $fuelS->fuel_type_alias;
        $fuelS->gas_station_alias = $dto->getGasStationAlias() ?? $fuelS->gas_station_alias;
        $fuelS->movement_type_alias = $dto->getMovementTypeAlias() ?? $fuelS->movement_type_alias;
        $fuelS->refill_amount = $dto->getRefillAmount() ?? $fuelS->refill_amount;
        $fuelS->traffic_jam_percentage = $dto->getTrafficJamPercentage() ?? $fuelS->traffic_jam_percentage;
        $fuelS->temperature = $dto->getTemperature() ?? $fuelS->temperature;
        $fuelS->description = $dto->getDescription() ?? $fuelS->description;
        $fuelS->tank_refill_time = $dto->getTankRefillTime() ?? $fuelS->tank_refill_time;
        $fuelS->save();

        return $fuelS->refresh();
    }

    /**
     * @param FuelStatisticFilterDto $filter
     * @return LengthAwarePaginator|FuelStatistic[]
     */
    public static function list(FuelStatisticFilterDto $filter): LengthAwarePaginator
    {
        $f = self::searchStart();
        $f = self::searchByUser($f, $filter->getUser());

        return self::paginate($f);
    }


    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public static function search(Request $request): LengthAwarePaginator
    {
        $f = self::searchStart();
        $f = self::searchByUser($f, $request->user());

        $f->orderByDesc('tank_refill_time');

        return self::paginate($f);
    }


    public static function paginate(Builder $builder): LengthAwarePaginator
    {
        return $builder->paginate(request()->perPage ?? 10);
    }

    /**
     * @param int $id
     * @return null|FuelStatistic
     */
    public static function find(int $id): ?FuelStatistic
    {
        return FuelStatistic::find($id);
    }

    public static function findOrFail(int $id)
    {
        return FuelStatistic::findOrFail($id);
    }



    /** *************************** START SEARCH *************************** */

    /**
     * @return FuelStatistic
     */
    public static function searchStart(): Builder
    {
        return FuelStatistic::query();
    }

    /**
     * @param FuelStatistic|Builder $model
     * @param \App\Models\User $user
     * @return Builder|FuelStatistic
     */
    private static function searchByUser(FuelStatistic|Builder $model, \App\Models\User $user): Builder
    {
        return $model->where('user_id', $user->id);
    }


    /** *************************** END SEARCH *************************** */

}
