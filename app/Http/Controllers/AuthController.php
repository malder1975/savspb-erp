<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Payload;
use Tymon\JWTAuth\Manager;



class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function signup(Request $request)
    {
        $v = Validator::make($request->json()->all(), [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed'
        ]);
        if ($v->fails())
        {
            return response()->json($v->errors()->toJson(), 400);
        }
        $user = User::create([
            'name' => $request->json()->get('name'),
            'email' => $request->json()->get('email'),
            'password' => Hash::make($request->json()->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->json()->all();

        try
        {
            if(! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentiald'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(['status' => 'success'], 200)->header('Authorization', $token);
    }

    public function getAuthenticatedUser()
    {
        try
        {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['Пользователь не найден'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getCode());
        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getCode());
        } catch (JWTException $e) {
            return response()->json(['token_absent'], $e->getCode());
        }
        return response()->json(compact('user'));
    }

    public function logout(Request $request)
    {
        $token = $request->header('Authorization');

        try
        {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                'status' => 'Success',
                'message' => 'Вышел из системы'
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Ошибка выхода, попробуйте позже'
            ], 500);
        }

    }

    public function refresh()
    {
        if ($token = JWTAuth::refresh()) {
            return response()->json([
                'status' => 'Success'
            ], 200)->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }


}
