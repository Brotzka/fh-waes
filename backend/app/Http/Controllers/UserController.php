<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Registers a new user
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $token = $user->createToken('UserToken');

        return response()->json([
            'success' => true,
            'message' => 'registered',
            'api_token' => $token->plainTextToken,
            'user' => $user
        ]);
    }

    /**
     * Logs a user into the application
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only(['email','password']);

        if(Auth::attempt($credentials)) {
            // success

            /** @var User $user */
            $user = Auth::user();
            $user->tokens()->delete();
            $token = $user->createToken('UserToken');

            return response()->json([
                'success' => true,
                'message' => 'Authenticated',
                'user' => $user,
                'api_token' => $token->plainTextToken
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No user found with these credentials!'

            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}
