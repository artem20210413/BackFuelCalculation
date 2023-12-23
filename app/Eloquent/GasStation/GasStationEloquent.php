<?php

namespace App\Eloquent\GasStation;

use App\Eloquent\Eloquent;
use App\Models\GasStation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class GasStationEloquent extends Eloquent
{

    /**
     * @return Collection|GasStation[]
     */
    public static function all(): Collection
    {
        return GasStation::all();
    }

    /** *************************** START SEARCH *************************** */

    /**
     * @return GasStation
     */
    public static function searchStart(): Builder
    {
        return GasStation::query();
    }



    /** *************************** END SEARCH *************************** */

}
