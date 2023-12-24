<?php

namespace App\Http\Controllers\Auth;

use App\Eloquent\User\UserEloquent;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\AuthenticateService;
use App\Services\Auth\LoginDto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AuthenticateController extends Controller
{

    /**
     * @OA\Post(
     * path="/login",
     * summary="Sign in",
     * description="Login by name, password",
     * operationId="authLogin",
     * tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="User credentials",
     *         @OA\JsonContent(
     *             required={"email", "password", "device_name"},
     *             @OA\Property(property="email", type="string", format="email", example="email@gmail.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password"),
     *             @OA\Property(property="device_name", type="string", example="mobile_device")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Login successful",
     *         @OA\JsonContent(
     *             @OA\Property(property="token", type="string", description="Access token", example="4|Rkkm6UGqW596clIYeaZoGn6Znb5txkltZOpGmOme88a7ebf6")
     *         )
     *     ),
     * )
     */

    public function login(LoginRequest $request, AuthenticateService $service)
    {
        $loginDto = new LoginDto($request);
        $token = $service->login($loginDto);

        return Response::json(['token' => $token]);
    }


    /**
     * @OA\Post(
     *     path="/register",
     *     summary="User registration",
     *     description="Register a new user",
     *     operationId="authRegister",
     *     tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="User registration details",
     *         @OA\JsonContent(
     *             required={"name", "email", "device_name", "password", "password_confirmation"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="email@gmail.com"),
     *             @OA\Property(property="device_name", type="string", example="mobile_device"),
     *             @OA\Property(property="password", type="string", format="password", example="password"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="password")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User registered successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="token", type="string", description="Access token", example="4|Rkkm6UGqW596clIYeaZoGn6Znb5txkltZOpGmOme88a7ebf6"),
     *             @OA\Property(format="array", property="user", example={
     *                 "name": "John Doe","email": "email3@gmail.com","updated_at": "2023-12-23T20:41:01.000000Z","created_at": "2023-12-23T20:41:01.000000Z","id": 4
     *             })
     *         )
     *     )
     * )
     */
    public function register(RegisterRequest $request, AuthenticateService $service)
    {
        $res = $service->register($request);
        return Response::json($res);
    }

    /**
     * @OA\Get(
     *     tags={"User"},
     *     path="/user",
     *     summary="UserIndex",
     *     description="UserIndex Description",
     *     operationId="UserIndex",
     *     security={ {"sanctum": {} }},
     * @OA\Response(
     *     response="200",
     *     description="success",
     *     @OA\JsonContent(
     *      @OA\Property(format="array", property="user", example={
     *          "name": "John Doe","email": "email3@gmail.com","updated_at": "2023-12-23T20:41:01.000000Z","created_at": "2023-12-23T20:41:01.000000Z","id": 4
     *      })
     *      )
     * )
     * ),
     */
    public function user(Request $request)
    {
        return $request->user();
    }

}
