<?php

namespace App\Services\Dto;

use App\Http\Resources\FuelStatisticResource;
use App\Models\FuelStatistic;
use Illuminate\Database\Eloquent\Collection;
use Nette\Utils\Json;

class StatisticDto
{
    private ?FuelStatisticResource $lastFillUp = null; // останнє заповнення
    private int $countOfRefills = 0; //кількість заправок
    private float $amountOfMoneySpent = 0.0;//Сума витрачених грошей
    private float $countOfFilledLiters = 0.0; //кількість заправлених літрів
    private float $countOfKilometersTraveled = 0.0; //кількість проїдених км
    private Collection $listPeriod; // список за період


    /**
     * @return int
     */
    public function getCountOfRefills(): int
    {
        return $this->countOfRefills;
    }

    /**
     * @param int $countOfRefills
     */
    public function setCountOfRefills(int $countOfRefills): void
    {
        $this->countOfRefills = $countOfRefills;
    }

    /**
     * @return float
     */
    public function getAmountOfMoneySpent(): float
    {
        return $this->amountOfMoneySpent;
    }

    /**
     * @param float $amountOfMoneySpent
     */
    public function setAmountOfMoneySpent(float $amountOfMoneySpent): void
    {
        $this->amountOfMoneySpent = $amountOfMoneySpent;
    }

    /**
     * @return float
     */
    public function getCountOfFilledLiters(): float
    {
        return $this->countOfFilledLiters;
    }

    /**
     * @param float $countOfFilledLiters
     */
    public function setCountOfFilledLiters(float $countOfFilledLiters): void
    {
        $this->countOfFilledLiters = $countOfFilledLiters;
    }

    /**
     * @return float
     */
    public function getCountOfKilometersTraveled(): float
    {
        return $this->countOfKilometersTraveled;
    }

    /**
     * @param float $countOfKilometersTraveled
     */
    public function setCountOfKilometersTraveled(float $countOfKilometersTraveled): void
    {
        $this->countOfKilometersTraveled = $countOfKilometersTraveled;
    }


    public function getLastFillUp(): mixed
    {
//        return $this->lastFillUp;
        return json_decode($this->lastFillUp?->toJson());
    }

    /**
     * @param FuelStatisticResource|null $lastFillUp
     */
    public function setLastFillUp(?FuelStatisticResource $lastFillUp): void
    {
        $this->lastFillUp = $lastFillUp;
    }

    /**
     * @return Collection
     */
    public function getListPeriod(): Collection
    {
        return $this->listPeriod;
    }

    /**
     * @param Collection $listPeriod
     */
    public function setListPeriod(Collection $listPeriod): void
    {
        $this->listPeriod = $listPeriod;
    }

}
