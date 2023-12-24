<?php

namespace App\Http\Controllers\Api;

use App\Eloquent\FuelStatistic\FuelStatisticDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\FuelStatisticRequest;
use App\Http\Resources\FuelStatisticResource;
use App\Http\Resources\FuelTypeResource;
use App\Services\FuelStatistic\FuelStatisticFilterDto;
use App\Services\FuelStatistic\FuelStatisticService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FuelStatisticController extends Controller
{
    /**
     * @OA\Post(
     *     path="/fuel-statistic",
     *     summary="Save fuel consumption statistics",
     *     description="Save fuel consumption statistics for a specific trip",
     *     operationId="saveFuelStatistic",
     *     tags={"Fuel Statistics"},
     *     security={ {"sanctum": {} }},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Fuel consumption statistics details <br> <br> Description of parameters: <br> <b>distance</b>:required, <br><b>volume</b>:required.",
     *         @OA\JsonContent(
     *             required={"id", "distance", "volume", "fuel_type_alias", "gas_station_alias", "movement_type_alias", "refill_amount", "traffic_jam_percentage", "description"},
     *             @OA\Property(property="id", type="integer", example=10, description="Unique identifier for the fuel statistic entry"),
     *             @OA\Property(property="distance", type="integer", example=230, description="Distance traveled in kilometers"),
     *             @OA\Property(property="volume", type="integer", example=30, description="Volume of fuel consumed in liters"),
     *             @OA\Property(property="fuel_type_alias", type="string", example="gas", description="Alias of the fuel type"),
     *             @OA\Property(property="gas_station_alias", type="string", example="wog", description="Alias of the gas station"),
     *             @OA\Property(property="movement_type_alias", type="string", example="city_with_traffic_jams", description="Alias of the movement type"),
     *             @OA\Property(property="refill_amount", type="number", example=800.25, description="Amount spent on refill in the local currency"),
     *             @OA\Property(property="traffic_jam_percentage", type="number", example=75.3, description="Percentage of time spent in traffic jams"),
     *             @OA\Property(property="description", type="string", example="description", description="Additional description or notes")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Fuel consumption statistics saved successfully",
     *         @OA\JsonContent(
     *
     *      @OA\Property(format="array", property="data", example={
     *          "id": 11,"distance": 230,"volume": 30,"fuel_consumption": 13.04,"fuel_type_alias": "gas","gas_station_alias": "wog","movement_type_alias": "city_with_traffic_jams","refill_amount": 800.25,"price_per_one": 26.68,"traffic_jam_percentage": 75.3,"temperature": null,"description": "description","created_at": "2023-12-24 19:53:36",                "updated_at": "2023-12-24 19:53:36"
     *      })
     *      )
     *     ),
     * )
     */

    public function save(FuelStatisticRequest $request, FuelStatisticService $service): JsonResponse
    {
        $dto = new FuelStatisticDto($request);
        $fuelStatistic = $service->save($dto);

        return success(new FuelStatisticResource($fuelStatistic));
    }

    public function list(Request $request, FuelStatisticService $service): JsonResponse
    {
        $filterDto = new FuelStatisticFilterDto($request);
        $fuelStatistic = $service->list($filterDto);

        return success(FuelStatisticResource::collection($fuelStatistic));
    }

}
