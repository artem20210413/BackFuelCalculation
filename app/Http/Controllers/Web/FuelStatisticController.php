<?php

namespace App\Http\Controllers\Web;

use App\Eloquent\FuelStatistic\FuelStatisticDto;
use App\Eloquent\FuelStatistic\FuelStatisticEloquent;
use App\Eloquent\FuelType\FuelTypeEloquent;
use App\Eloquent\GasStation\GasStationEloquent;
use App\Eloquent\MovementType\MovementTypeEloquent;
use App\Http\Controllers\Controller;
use App\Http\Requests\FuelStatisticRequest;
use App\Http\Requests\StatisticsRequest;
use App\Http\Resources\FuelStatisticResource;
use App\Http\Resources\FuelTypeResource;
use App\Services\FuelStatistic\FuelStatisticFilterDto;
use App\Services\FuelStatistic\FuelStatisticService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FuelStatisticController extends Controller
{


    public function formSend(FuelStatisticRequest $request, FuelStatisticService $service)
    {
        $dto = new FuelStatisticDto($request);

        $fuelStatistic = $service->save($dto);

        return Redirect::route('fuel-statistic-list')->with(['success' => 'Збережено']);
    }

    public function form()
    {
        $gasStations = GasStationEloquent::all();
        $fuelTypes = FuelTypeEloquent::all();
        $movementTypes = MovementTypeEloquent::all();

//        dd('fuelStatisticForm');

        return view('pages.fuel-statistic-form', ['gasStations' => $gasStations, 'fuelTypes' => $fuelTypes, 'movementTypes' => $movementTypes]);
    }

    public function list(Request $request)
    {
        $fuelStatistics = FuelStatisticEloquent::search($request);
        $fuelStatistics = FuelStatisticResource::collection($fuelStatistics);

        return view('pages.fuel-statistic-list', compact('fuelStatistics'));
    }

    public function statistics(StatisticsRequest $request, FuelStatisticService $service)
    {
        $statistic = $service->statistics($request);

        return view('pages.fuel-statistic-statistics', compact('statistic'));
    }

}
