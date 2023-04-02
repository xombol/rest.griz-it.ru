<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserApiRequest;
use App\Http\Requests\Api\UserRegRequest;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use function response;

class AuthController extends Controller
{
    /**
     * Авторизация АПИ
     * url - https://rest.griz-it.ru/api/auth/register
     *
     * @param UserApiRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(UserApiRequest $request): \Illuminate\Http\JsonResponse
    {
        $credentials = $request->only('login', 'password');

        $regex = [
            'email' => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i',
            'phone' => '/^\\+7[0-9]{10}$/'
        ];

        if (preg_match($regex['phone'], $request->login)) {
            $type = 'phone';
            unset($credentials['login']);
            $credentials['phone'] = $request->login;

        } else if (preg_match($regex['email'], $request->login)) {
            $type = 'email';
            unset($credentials['login']);
            $credentials['email'] = $request->login;
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid login'
            ], 401);
        }

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid login details'
            ], 401);
        }
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'status' => true,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

}

