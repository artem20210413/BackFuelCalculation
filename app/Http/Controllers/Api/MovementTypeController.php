<?php

namespace App\Http\Controllers\Api;

use App\Eloquent\GasStation\GasStationEloquent;
use App\Http\Controllers\Controller;
use App\Http\Resources\GasStationResource;
use App\Http\Resources\MovementTypeResource;
use App\Services\GasStation\GasStationService;
use App\Services\MovementType\MovementTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MovementTypeController extends Controller
{


    /**
     * @OA\Get(
     *     path="/movement-type",
     *     summary="Get a list of movement types",
     *     description="Retrieve a list of available movement types",
     *     operationId="getMovementTypes",
     *     tags={"Movement Types"},
     *     security={ {"sanctum": {} }},
     *     @OA\Response(
     *         response=200,
     *         description="List of movement types",
     *         @OA\JsonContent(
     *
     *      @OA\Property(format="array", property="data", example={
     *           {"alias": "city_with_traffic_jams","name": "Місто з пробками"},{"alias": "city","name": "Місто"},{"alias": "track","name": "Траса"},{"alias": "city_and_highway","name": "Місто та траса"        }
     *      })
     *         )
     *     ),
     * )
     */

    public function list(Request $request, MovementTypeService $service): JsonResponse
    {
        $movementType = $service->list();

        return success(MovementTypeResource::collection($movementType));
    }

}
