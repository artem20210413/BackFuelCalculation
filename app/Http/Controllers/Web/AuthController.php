<?php

namespace App\Http\Controllers\Web;


use App\Eloquent\User\UserEloquent;
use App\Enum\EnumDeviceName;
use App\Services\Auth\AuthenticateGoogleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
            return Redirect::route('home'); // Перенаправление на нужную страницу после успешного входа
        }

        // Аутентификация не удалась
        return back()->with('error', 'Неверные учетные данные.'); // Перенаправление назад с сообщением об ошибке
    }

    function attemptLogout()
    {
        Auth::logout();
        return Redirect::route('login');
    }

    function redirectToGoogle()
    {

        return Socialite::driver('google')->redirect();

    }

    function googleCallback(AuthenticateGoogleService $service)
    {
        $googleUser = Socialite::driver('google')->user();
        $service->authGoogle($googleUser);

        return route('home'); // Перенаправление назад с сообщением об ошибке
    }
}
