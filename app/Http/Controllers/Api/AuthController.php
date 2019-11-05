<?php

namespace App\Http\Controllers\Api;

use App\Models\Personal;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Payload;
use Tymon\JWTAuth\Manager as JWT;



class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['signin', 'signup']]);
    }

    public function username()
    {
        return 'name';
    }

    public function signup(Request $request)
    {
        $v = Validator::make($request->json()->all(), [
            'name' => 'required|max:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
        ]);
        if ($v->fails())
        {
            return response()->json($v->errors()->toJson(), 400);
        }

        $person = User::create([
            'name' => $request->json()->get('name'),
            'email' => $request->json()->get('email'),
            'password' => Hash::make($request->json()->get('password')),

        ]);
        $token = JWTAuth::fromUser($person);

        return response()->json(compact('person', 'token'), 201);
    }

    public function signin(Request $request)
    {
        $credentials = $request->json()->all();
        //$credentials = $request->only('LOGIN', 'PASS');
        try
        {
            if (! $token = JWTAuth::attempt($credentials)) {
                //return  response()->json($token);
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        }catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        //return response()->json(compact('token'));
        return response()->json(['status' => 'success'], 200)->header('Authorization', $token);
    }

   public function getAuthenticatedUser()
    {
        try {
            if (!$person = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['Пользователь не найден'], 404);
            }
        }catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getCode());
        }catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getCode());
        }catch (JWTException $e) {
            return response()->json(['token_absent'], $e->getCode());
        }
        return response()->json(compact('person'));
    }

    public function logout(Request $request)
    {
        $token = $request->header('Authorization');
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                'status' => 'Success',
                'message' => 'Пользователь вышел из системы'
            ], 200);
        } catch (JWTException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ошибка, выход не выполнен. Попробуйте позже'
            ], 500);
        }
    }

    public function refresh()
    {
        if ($token = JWTAuth::refresh()) {
            return response()->json(['status' => 'Success'], 200)->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }
}
