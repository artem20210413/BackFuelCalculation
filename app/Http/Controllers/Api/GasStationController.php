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

    public function list(Request $request, GasStationService $service): JsonResponse
    {
        $gasStations = $service->list();

        return success(GasStationResource::collection($gasStations));
    }

}
