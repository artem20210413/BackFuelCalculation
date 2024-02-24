<?php

namespace App\Http\Controllers\Auth;

use App\Eloquent\User\UserEloquent;
use App\Enum\EnumDeviceName;
use App\Services\Auth\AuthenticateGoogleService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;

class AuthGoogleController
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(AuthenticateGoogleService $service)
    {
        $googleUser = Socialite::driver('google')->user();
        $user = $service->authGoogle($googleUser);
        $token = UserEloquent::createToken($user, EnumDeviceName::GOOGLE); // Создаем токен для пользователя

        return Response::json(['token' => $token]);
    }

}
