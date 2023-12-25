<?php

namespace App\Services\FuelStatistic;

use App\Eloquent\FuelStatistic\FuelStatisticDto;
use App\Eloquent\FuelStatistic\FuelStatisticEloquent;
use App\Models\FuelStatistic;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class FuelStatisticService
{
    /**
     * @param FuelStatisticDto $dto
     * @return FuelStatistic
     */
    public function save(FuelStatisticDto $dto)
    {
        return FuelStatisticEloquent::save($dto);
    }

    /**
     * @param FuelStatisticFilterDto $filter
     * @return Collection|FuelStatistic[]
     */
    public function list(FuelStatisticFilterDto $filter): LengthAwarePaginator
    {
        return FuelStatisticEloquent::list($filter);
    }
}
