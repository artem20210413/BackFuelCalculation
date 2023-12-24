<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FuelTypeResource;
use App\Services\FuelType\FuelTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FuelTypeController extends Controller
{

    /**
     * @OA\Get(
     *     path="/fuel-type",
     *     summary="Get a list of fuel types",
     *     description="Retrieve a list of available fuel types",
     *     operationId="getFuelTypes",
     *     tags={"Fuel Types"},
     *     security={ {"sanctum": {} }},
     *     @OA\Parameter(
     *         name="gasStation",
     *         in="query",
     *         description="Alias of the gas station (optional)",
     *         required=false,
     *         @OA\Schema(type="string", example="wog")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of fuel types",
     *         @OA\JsonContent(
     *              @OA\Property(format="array", property="data", example={
     *                  {"alias": "gas","name": "газ","gas_station_alias": null},{"alias": "95","name": "95","gas_station_alias": null},{"alias": "92","name": "92","gas_station_alias": null       }
     *              })
     *         )
     *     ),
     * )
     */

    public function list(Request $request, FuelTypeService $service): JsonResponse
    {
        $gasStation = $request->gasStation;
        $fuelTypes = $service->list($gasStation);

        return success(FuelTypeResource::collection($fuelTypes));
    }

}
