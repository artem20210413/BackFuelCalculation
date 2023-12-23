<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FuelTypeResource;
use App\Services\FuelType\FuelTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FuelTypeController extends Controller
{

    public function list(Request $request, FuelTypeService $service): JsonResponse
    {
        $gasStation = $request->gasStation;
        $fuelTypes = $service->list($gasStation);

        return success(FuelTypeResource::collection($fuelTypes));
    }

}
