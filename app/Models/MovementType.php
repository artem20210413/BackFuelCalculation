<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class MovementType
 * @package App\Models
 * @property int id
 * @property string alias
 * @property string name
 */
class MovementType extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['alias', 'name'];
}
