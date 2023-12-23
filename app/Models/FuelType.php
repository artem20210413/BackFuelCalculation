<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FuelType
 * @package App\Models
 * @property int id
 * @property string alias
 * @property string name
 * @property string|null gas_station_alias
 */
class FuelType extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['alias', 'name', 'gas_station_alias'];
}
