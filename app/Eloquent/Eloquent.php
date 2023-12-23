<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Builder;

abstract class Eloquent
{



    /** *************************** START SEARCH *************************** */

    public static function searchIds(Builder &$model, ?int ...$ids): Builder
    {
        return $ids
            ? $model->whereIn('id', $ids)
            : $model;
    }

    public static function searchActiveBool(Builder &$model, ?bool $active): Builder
    {
        return $active !== null
            ? $model->where('active', $active)
            : $model;
    }


    /**
     * @param Builder $model
     * @param string|null $searchName
     * @return Builder
     */
    public static function searchByNameLike(Builder &$model, ?string $searchName): Builder
    {
        return $searchName
            ? $model->where('name', 'like', "%$searchName%")
            : $model;
    }




    /** *************************** END SEARCH *************************** */

}
