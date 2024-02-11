<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FuelStatistic
 * @package App\Models
 * @property int id
 * @property int user_id
 * @property float distance
 * @property float volume
 * @property float|null temperature
 * @property string|null fuel_type_alias
 * @property string|null gas_station_alias
 * @property string|null movement_type_alias
 * @property float|null refill_amount
 * @property float|null traffic_jam_percentage
 * @property string|null description
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon tank_refill_time
 */
class FuelStatistic extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'distance', 'volume', 'temperature', 'fuel_type_alias', 'gas_station_alias', 'movement_type_alias',
        'refill_amount', 'traffic_jam_percentage', 'description', 'tank_refill_time'];
}
