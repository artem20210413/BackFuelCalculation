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


    /**
     * @OA\Get(
     *     path="/fuel-statistic",
     *     summary="Get a list of fuel consumption statistics",
     *     description="Retrieve a paginated list of fuel consumption statistics",
     *     operationId="getFuelStatistics",
     *     tags={"Fuel Statistics"},
     *     security={ {"sanctum": {} }},
     *     @OA\Parameter(
     *         name="perPage",
     *         in="query",
     *         description="Number of items per page",
     *         required=false,
     *         @OA\Schema(type="integer", example=10)
     *     ),
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page number",
     *         required=false,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of fuel consumption statistics",
     *         @OA\JsonContent(
     *      @OA\Property(format="array", property="data", example={
     *         {"id": 5,"distance": 3333.3,"volume": 333.3,"fuel_consumption": 10,"fuel_type_alias": "gas","gas_station_alias": "wog","movement_type_alias": "city_with_traffic_jams","refill_amount": 800.25,"price_per_one": 2.4,"traffic_jam_percentage": 75.3,"temperature": null,"description": "description","created_at": "2023-12-14 21:12:31","updated_at": "2023-12-14 21:13:00"},{"id": 11,"distance": 230,"volume": 30,"fuel_consumption": 13.04,"fuel_type_alias": "gas","gas_station_alias": "wog","movement_type_alias": "city_with_traffic_jams","refill_amount": 800.25,"price_per_one": 26.68,"traffic_jam_percentage": 75.3,"temperature": null,"description": "description","created_at": "2023-12-24 19:53:36","updated_at": "2023-12-24 19:53:36"                     }
     *     }),
     *      @OA\Property(format="array", property="links", example={
    "first": "https://fuel.tishchenko.loc.ua/api/fuel-statistic?page=1","last": "https://fuel.tishchenko.loc.ua/api/fuel-statistic?page=2","prev": "https://fuel.tishchenko.loc.ua/api/fuel-statistic?page=1","next": null
     *     }),
     *      @OA\Property(format="array", property="meta", example={
     *     "current_page": 2,"from": 5,"last_page": 2,"links": {{"url": "https://fuel.tishchenko.loc.ua/api/fuel-statistic?page=1","label": "&laquo; Previous","active": false},{"url": "https://fuel.tishchenko.loc.ua/api/fuel-statistic?page=1","label": "1","active": false},{"url": "https://fuel.tishchenko.loc.ua/api/fuel-statistic?page=2","label": "2","active": true},{"url": null,"label": "Next &raquo;","active": false}},"path": "https://fuel.tishchenko.loc.ua/api/fuel-statistic","per_page": 4,"to": 6,                                                                                    "total": 6
     *     }),
     *         )
     *     )
     * )
     */
    public function list(Request $request, FuelStatisticService $service)
    {
        $filterDto = new FuelStatisticFilterDto($request);
        $fuelStatistic = $service->list($filterDto);

        return FuelStatisticResource::collection($fuelStatistic);
    }

}
