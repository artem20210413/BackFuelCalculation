<?php

namespace App\Services\FuelStatistic;

use App\Models\User;
use Illuminate\Http\Request;

class FuelStatisticFilterDto
{

    private User $user;
    private ?float $distance = null;
    private ?float $volume = null;
    private ?string $fuelTypeAlias = null;
    private ?string $gasStationAlias = null;
    private ?string $movementTypeAlias = null;
    private ?float $refillAmount = null;
    private ?float $trafficJamPercentage = null;
    private ?float $temperature = null;
    private ?string $description = null;

    public function __construct(?Request $request = null)
    {
        if (!$request)
            return $this;

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


        return $this;
    }

    /**
     * @return float
     */
    public function getDistance(): ?float
    {
        return $this->distance;
    }

    /**
     * @param float $distance
     */
    public function setDistance(?float $distance): void
    {
        $this->distance = $distance;
    }

    /**
     * @return float
     */
    public function getVolume(): ?float
    {
        return $this->volume;
    }

    /**
     * @param float $volume
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
     * @return float|null
     */
    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    /**
     * @param float|null $temperature
     */
    public function setTemperature(?float $temperature): void
    {
        $this->temperature = $temperature;
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
}
