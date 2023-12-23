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

    public function list(Request $request, MovementTypeService $service): JsonResponse
    {
        $movementType = $service->list();

        return success(MovementTypeResource::collection($movementType));
    }

}
