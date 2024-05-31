<?php

namespace App\Services\FuelStatistic;

use App\Eloquent\FuelStatistic\FuelStatisticDto;
use App\Eloquent\FuelStatistic\FuelStatisticEloquent;
use App\Http\Requests\StatisticsRequest;
use App\Http\Resources\FuelStatisticResource;
use App\Models\FuelStatistic;
use App\Models\User;
use App\Services\Dto\StatisticDto;
use Carbon\Carbon;
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

    /**
     * @param StatisticsRequest $request
     * @return StatisticDto
     */
    public function statistics(StatisticsRequest $request): StatisticDto
    {
        $startDate = Carbon::parse($request->start_date ?? now()->subDays(30)->toDateString());
        $endDate = Carbon::parse($request->end_date);

        $statistic = new StatisticDto();

        $listPeriod = FuelStatisticEloquent::period($startDate, $endDate);
        $statistic->setListPeriod($listPeriod);
        $statistic->setCountOfRefills(count($listPeriod));
        $statistic->setCountOfFilledLiters($listPeriod->sum('volume'));
        $statistic->setAmountOfMoneySpent($listPeriod->sum('refill_amount'));
        $statistic->setCountOfKilometersTraveled($listPeriod->sum('distance'));

        if ($last = FuelStatisticEloquent::last())
            $statistic->setLastFillUp(new FuelStatisticResource($last));


        return $statistic;
    }
}
