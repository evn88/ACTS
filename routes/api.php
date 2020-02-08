<?php

use Illuminate\Http\Request;

use App\User;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:api','can:admin']], function () {
    Route::get('user', 'API\UserController@index');
    Route::get('user/{id}', 'API\UserController@show')->where(['id'=>'[0-9+]']);
    Route::post('test/add-new-test', 'API\TestController@store');

    Route::delete('user/{id}/delete', 'API\UserController@destroy')->where(['id'=>'[0-9]+']);
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('test/{plan_id}', 'API\TestController@show')->where(['plan_id'=>'[0-9]+']);
    Route::post('test/storeuseranswer', 'API\TestController@storeanswer');
});
