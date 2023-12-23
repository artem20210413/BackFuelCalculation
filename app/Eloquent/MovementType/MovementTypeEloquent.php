<?php

namespace App\Eloquent\MovementType;

use App\Eloquent\Eloquent;
use App\Models\MovementType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class MovementTypeEloquent extends Eloquent
{

    /**
     * @return Collection|MovementType[]
     */
    public static function all(): Collection
    {
        return MovementType::all();
    }

    /** *************************** START SEARCH *************************** */

    /**
     * @return MovementType
     */
    public static function searchStart(): Builder
    {
        return MovementType::query();
    }


    /** *************************** END SEARCH *************************** */

}
