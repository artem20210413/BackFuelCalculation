<?php

namespace App\Http\Controllers\Api;

use App\Eloquent\GasStation\GasStationEloquent;
use App\Http\Controllers\Controller;
use App\Http\Resources\GasStationResource;
use App\Services\GasStation\GasStationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class GasStationController extends Controller
{
    /**
     * @OA\Get(
     *     path="/gas-station",
     *     summary="Get available gas stations",
     *     description="Retrieve a list of available gas stations",
     *     operationId="getGasStations",
     *     tags={"Gas Stations"},
     *     security={ {"sanctum": {} }},
     *     @OA\Response(
     *         response=200,
     *         description="List of available gas stations",
     *         @OA\JsonContent(
     *      @OA\Property(format="array", property="data", example={
     *          {"alias": "wog","name": "WOG"},{"alias": "shell","name": "Shell" }
     *      })
     *         )
     *     ),
     * )
     */


    public function list(Request $request, GasStationService $service): JsonResponse
    {
        $gasStations = $service->list();

        return success(GasStationResource::collection($gasStations));
    }

}
