<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GasStation
 * @package App\Models
 * @property int id
 * @property string alias
 * @property string name
 */
class GasStation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['alias', 'name'];
}
