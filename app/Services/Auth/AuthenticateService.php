<?php

namespace App\Services\Auth;

use App\Eloquent\User\UserEloquent;
use App\Eloquent\User\UserEloquentDto;
use App\Enum\EnumDeviceName;
use App\Enum\EnumTokenAbilities;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
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

}
