<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Personal;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//Illuminate\Foundation\Auth\SendsPasswordResetEmails;
//Illuminate\ ResetsPasswords;

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

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function signup(Request $request)
    {
        $v = Validator::make($request->json()->all(), [
            'FAM' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users',
            'PASS' => 'required|min:3|confirmed'
        ]);
        if ($v->fails())
        {
            return response()->json(['status' => 'error',
                'errors' => $v->errors()], 422);
        }
        $user = Personal::create([
            'FAM' => $request->json()->get('FAM'),
            'email' => $request->json()->get('email'),
            'PASS' => Hash::make($request->json()->get('PASS')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 200);
    }

    public function login(Request $request, $remember = false)
    {
       // $credentials = $request->json()->all();
        $credentials = $request->only('email', 'password', 'LEVELS_ID');

        try
        {
            if(! $token = JWTAuth::attempt($credentials, $remember)) {
                return response()->json(['error' => 'invalid_credentiald'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(['status' => 'success'], 200)->header('Authorization', 'bearer '.$token);
    }

    public function getAuthenticatedUser(Request $request)
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
        //$user = JWTAuth::toUser($request->tok )
        return response()->json(['result' => $user]); //compact('user')
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
        $token = JWTAuth::getToken();
        if ($token = JWTAuth::refresh($token)) {
            return response()->json([
                'status' => 'Success'
            ], 200)->header('Authorization', 'Bearer ' .$token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

/*    protected function guard()
    {
        return Auth::guard();
    }*/

   /* public function sendPasswordResetLink(Request $request)
    {
        return $this->sendResetLinkEmail($request);
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response()->json([
            'message' => 'Отправлено письмо восстановления пароля',
            'data' => $response
        ]);
    }

    protected function sendResetLinkFiledResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Невозможно отправить письмо на указанный адрес']);
    }

    public function callResetPassword(Request $request)
    {
        return $this->reset($request);
    }

    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();

        event(new PasswordReset($user));
    }

    protected function sentResetResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Пароль успешно изменен.']);
    }

    protected function sentResetFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Ошибка! Неверный ключ доступа пользователя.']);
    }*/
}
