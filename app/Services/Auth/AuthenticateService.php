<?php

namespace App\Services\Auth;

use App\Eloquent\User\UserEloquent;
use App\Eloquent\User\UserEloquentDto;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticateService
{
    public function login(LoginDto $loginDto)
    {
        $user = UserEloquent::findByEmail($loginDto->getEmail());

        if (!$user || !$user->checkPassword($loginDto->getPassword()) || !$user->checkActive()) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

//        return $user->createToken($loginDto->getDeviceName(),[EnumTokenAbilities::ability(EnumTokenAbilities::TEST)])->plainTextToken;
        return $user->createToken($loginDto->getDeviceName())->plainTextToken;
    }

    public function register(RegisterRequest $request): array
    {
        $deviceName = $request->device_name;
        $userDto = new UserEloquentDto($request);

        $user = UserEloquent::register($userDto);
        $token = UserEloquent::createToken($user, $deviceName);

        return [
            'token' => $token,
            'user' => $user,
        ];
    }

    public function logout(Request $request): void
    {
        $user = Auth::user();

        // Отзыв текущего активного токена пользователя
        $user->token()->revoke();
//        $user = $request->user();
        dd($user);
//        // Отзыв текущего активного токена пользователя
//        $user->token()->revoke();
    }

}
