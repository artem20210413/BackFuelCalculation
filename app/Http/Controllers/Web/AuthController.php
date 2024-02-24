<?php

namespace App\Http\Controllers\Web;


use App\Eloquent\User\UserEloquent;
use App\Enum\EnumDeviceName;
use App\Services\Auth\AuthenticateGoogleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;

class AuthController
{
    function login()
    {
        return view('pages.login');
    }

    function attemptLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Аутентификация успешна
            return redirect('/dashboard'); // Перенаправление на нужную страницу после успешного входа
        }

        // Аутентификация не удалась
        return back()->with('error', 'Неверные учетные данные.'); // Перенаправление назад с сообщением об ошибке
    }

    function redirectToGoogle()
    {

        return Socialite::driver('google')->redirect();

    }

    function googleCallback(AuthenticateGoogleService $service)
    {
        $googleUser = Socialite::driver('google')->user();
        $user = $service->authGoogle($googleUser);
//        $token = UserEloquent::createToken($user, EnumDeviceName::GOOGLE); // Создаем токен для пользователя

        return route('home'); // Перенаправление назад с сообщением об ошибке
    }
}
