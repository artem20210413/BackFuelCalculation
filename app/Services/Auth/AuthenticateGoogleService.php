<?php

namespace App\Services\Auth;

use App\Eloquent\User\UserEloquent;
use App\Eloquent\User\UserEloquentDto;
use App\Enum\EnumDeviceName;
use App\Enum\EnumTokenAbilities;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticateGoogleService
{
    public function authGoogle(\Laravel\Socialite\Contracts\User $googleUser): User
    {
        $user = UserEloquent::findByEmail($googleUser->getEmail());

        if (!$user) {
            $userEloquentDto = new UserEloquentDto();
            $userEloquentDto->setEmail($googleUser->getEmail());
            $userEloquentDto->setName($googleUser->getName());
            $userEloquentDto->setPassword($googleUser->token);
            $user = UserEloquent::register($userEloquentDto);
        }
        Auth::login($user, true);
        UserEloquent::updateGoogleUser($user, $googleUser);

        return $user;
    }
}
