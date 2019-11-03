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
        Route::post('reset-password', 'AuthController@sendPasswordResetLink');
        //Route::post('reset/password', 'AuthController@callResetPassword');


        Route::group(['middleware' => 'jwt.auth'], function () {
            Route::get('user', 'AuthController@getAuthenticatedUser');
            Route::get('personal', 'Personal\PersonalController@index')->middleware('isSuperAdmin');
            Route::get('personal/{id}', 'Personal\PersonalController@show')->middleware('isAdminOrSelf');
            //Route::resource('personal', 'Personal\PersonalController', ['except' => ['create', 'edit']]);
            Route::post('logout', 'AuthController@logout');
            Route::get('person-account', 'Personal\PersonController@index');
            Route::get('suppliers', 'Api\PostPok\SuppliersController@index');
            Route::get('supplier/{id}', 'Api\PostPok\SuppliersController@show');
            Route::post('supplier/{id}', 'Api\PostPok\SuppliersController@update');
            Route::post('supplier/{id}', 'Api\PostPok\SuppliersController@destroy');
            Route::get('suppliers/{id}/price-lists', 'Api\PostPok\SuppliersController@suplprlists');
            Route::get('organisations', 'Api\PostPok\SuppliersController@organisations');
            Route::get('merchandises', 'Api\PostPok\SuppliersController@merchandises');
            Route::get('customers', 'Api\PostPok\CustomersController@index');
        });

        Route::group(['middleware' => 'jwt.refresh'], function () {
            Route::get('refresh', 'AuthController@refresh');
        });
       /* Route::middleware('auth:api')->group(function () {
            Route::get('user', 'AuthController@getAuthenticatedUser');
            Route::get('refresh', 'AuthController@refresh');
            //Route::get('person', ['uses' => 'AuthController@getDetails']);
            Route::post('logout', 'AuthController@logout');
        }); */
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


