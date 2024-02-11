<?php

namespace App\Eloquent\FuelStatistic;

use App\Eloquent\EloquentDto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class FuelStatisticDto extends EloquentDto
{
    private User $user;
    private ?float $distance;
    private ?float $volume;
    private ?string $fuelTypeAlias = null;
    private ?string $gasStationAlias = null;
    private ?string $movementTypeAlias = null;
    private ?float $refillAmount = null;
    private ?float $trafficJamPercentage = null;
    private ?float $temperature = null;
    private ?string $description = null;
    private ?Carbon $tankRefillTime = null;

    public function __construct(?FormRequest $request = null)
    {
        if (!$request)
            return $this;

        $this->setId($request->id);
        $this->setUser($request->user());
        $this->setDistance($request->distance);
        $this->setVolume($request->volume);
        $this->setFuelTypeAlias($request->fuel_type_alias);
        $this->setGasStationAlias($request->gas_station_alias);
        $this->setMovementTypeAlias($request->movement_type_alias);
        $this->setRefillAmount($request->refill_amount);
        $this->setTrafficJamPercentage($request->traffic_jam_percentage);
        $this->setTemperature($request->temperature);
        $this->setDescription($request->description);
        $this->setTankRefillTime($request->tank_refill_time);

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return null|float
     */
    public function getDistance(): ?float
    {
        return $this->distance;
    }

    /**
     * @param null|float $distance
     */
    public function setDistance(?float $distance): void
    {
        $this->distance = $distance;
    }

    /**
     * @return null|float
     */
    public function getVolume(): ?float
    {
        return $this->volume;
    }

    /**
     * @param null|float $volume
     */
    public function setVolume(?float $volume): void
    {
        $this->volume = $volume;
    }

    /**
     * @return string|null
     */
    public function getFuelTypeAlias(): ?string
    {
        return $this->fuelTypeAlias;
    }

    /**
     * @param string|null $fuelTypeAlias
     */
    public function setFuelTypeAlias(?string $fuelTypeAlias): void
    {
        $this->fuelTypeAlias = $fuelTypeAlias;
    }

    /**
     * @return string|null
     */
    public function getGasStationAlias(): ?string
    {
        return $this->gasStationAlias;
    }

    /**
     * @param string|null $gasStationAlias
     */
    public function setGasStationAlias(?string $gasStationAlias): void
    {
        $this->gasStationAlias = $gasStationAlias;
    }

    /**
     * @return string|null
     */
    public function getMovementTypeAlias(): ?string
    {
        return $this->movementTypeAlias;
    }

    /**
     * @param string|null $movementTypeAlias
     */
    public function setMovementTypeAlias(?string $movementTypeAlias): void
    {
        $this->movementTypeAlias = $movementTypeAlias;
    }

    /**
     * @return float|null
     */
    public function getRefillAmount(): ?float
    {
        return $this->refillAmount;
    }

    /**
     * @param float|null $refillAmount
     */
    public function setRefillAmount(?float $refillAmount): void
    {
        $this->refillAmount = $refillAmount;
    }

    /**
     * @return float|null
     */
    public function getTrafficJamPercentage(): ?float
    {
        return $this->trafficJamPercentage;
    }

    /**
     * @param float|null $trafficJamPercentage
     */
    public function setTrafficJamPercentage(?float $trafficJamPercentage): void
    {
        $this->trafficJamPercentage = $trafficJamPercentage;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }


    /**
     * @return float
     */
    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    /**
     * @param float $temperature
     */
    public function setTemperature(?float $temperature): void
    {
        $this->temperature = $temperature;
    }

    /**
     * @return Carbon|null
     */
    public function getTankRefillTime(): ?Carbon
    {
        return $this->tankRefillTime;
    }

    /**
     * @param Carbon|null $tankRefillTime
     */
    public function setTankRefillTime(null|Carbon|string $tankRefillTime): void
    {
        $this->tankRefillTime = Carbon::parse($tankRefillTime);
    }

}
