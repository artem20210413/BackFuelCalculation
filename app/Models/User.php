<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * @package App\Models
 * @property int id
 * @property string email
 * @property string name
 * @property string password
 * @property string|null avatar_url
 * @property bool active
 * @property Carbon|null email_verified_at
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class User extends Authenticate
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function checkPassword(string $password): bool
    {
        return Hash::check($password, $this->password);
    }

    public function hashPassword(string $password): void
    {
        $this->password = Hash::make($password);
    }

    public function checkActive(): bool
    {
        return $this->active;
    }

}
