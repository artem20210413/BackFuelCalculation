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
