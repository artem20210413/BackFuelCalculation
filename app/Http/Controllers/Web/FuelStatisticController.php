<?php

namespace App\Http\Controllers\Web;

use App\Eloquent\FuelStatistic\FuelStatisticDto;
use App\Eloquent\FuelType\FuelTypeEloquent;
use App\Eloquent\GasStation\GasStationEloquent;
use App\Eloquent\MovementType\MovementTypeEloquent;
use App\Http\Controllers\Controller;
use App\Http\Requests\FuelStatisticRequest;
use App\Http\Resources\FuelStatisticResource;
use App\Http\Resources\FuelTypeResource;
use App\Services\FuelStatistic\FuelStatisticFilterDto;
use App\Services\FuelStatistic\FuelStatisticService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FuelStatisticController extends Controller
{


    public function fuelStatisticFormSend(FuelStatisticRequest $request, FuelStatisticService $service)
    {
        $dto = new FuelStatisticDto($request);

        $fuelStatistic = $service->save($dto);

        return Redirect::back()->with(['success'=> 'Saved']);
    }

    public function fuelStatisticForm()
    {
        $gasStations = GasStationEloquent::all();
        $fuelTypes = FuelTypeEloquent::all();
        $movementTypes = MovementTypeEloquent::all();

//        dd('fuelStatisticForm');

        return view('pages.fuel-statistic-form', ['gasStations' => $gasStations, 'fuelTypes' => $fuelTypes, 'movementTypes' => $movementTypes]);
    }

    public function list(Request $request, FuelStatisticService $service)
    {
        $filterDto = new FuelStatisticFilterDto($request);
        $fuelStatistic = $service->list($filterDto);
        $fuelStatistic = FuelStatisticResource::collection($fuelStatistic);

        dd($fuelStatistic);
        return view('list');
    }

}
