<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FuelStatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        $mathRound = config('options.math.round');
        $fuelConsumption = $this->volume / $this->distance * 100;
        $pricePerOne = $this->refill_amount / $this->volume;
        return [
            'id' => $this->id,
            'distance' => $this->distance,
            'volume' => $this->volume,
            'fuel_consumption' => round($fuelConsumption, $mathRound),
            'fuel_type_alias' => $this->fuel_type_alias,
            'gas_station_alias' => $this->gas_station_alias,
            'movement_type_alias' => $this->movement_type_alias,
            'refill_amount' => $this->refill_amount,
            'price_per_one' => round($pricePerOne, $mathRound),
            'traffic_jam_percentage' => $this->traffic_jam_percentage,
            'temperature' => $this->temperature,
            'description' => $this->description,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
