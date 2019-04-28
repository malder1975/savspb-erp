<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('register', 'AuthController@signup');
        Route::post('login', 'AuthController@login');
        Route::get('refresh', 'AuthController@refresh');
        Route::get('user', 'AuthController@getAuthenticatedUser');
        Route::post('reset-password', 'AuthController@sendPasswordResetLink');
        Route::post('reset/password', 'AuthController@callResetPassword');

        Route::middleware('auth:api')->group(function () {
            Route::get('person', ['uses' => 'AuthController@getDetails']);
            Route::post('logout', 'AuthController@logout');
        });
    });

    Route::middleware('auth:api')->get('/user', function(Request $request) {
        return $request->user();
    });
});


/*
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('signup', ['uses' => 'AuthController@signup']);
    Route::post('login', ['uses' => 'AuthController@login']);
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', ['uses' => 'AuthController@logout']);
        Route::get('details', ['uses' => 'AuthController@getDetails']);
    });
});*/


