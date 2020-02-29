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



//доступ только для админов
Route::group(['middleware' => ['auth:api','can:admin']], function () {
    Route::get('user', 'API\UserController@index');
    Route::get('user/{id}', 'API\UserController@show')->where(['id'=>'[0-9+]']);

    Route::post('test', 'API\TestController@store');
    Route::get('test/{test_id}', 'API\TestController@show')->where(['test_id'=>'[0-9]+']);
    Route::post('test/{test_id}', 'API\TestController@update')->where(['test_id'=>'[0-9]+']);

    Route::delete('user/{id}/delete', 'API\UserController@destroy')->where(['id'=>'[0-9]+']);
});

//доступ всем авторизованным пользователям
Route::group(['middleware' => ['auth:api']], function () {
    Route::get('test/{plan_id}', 'API\TestController@index')->where(['plan_id'=>'[0-9]+']);
    Route::post('test/storeuseranswer', 'API\TestController@storeanswer');
    Route::get('test/result/{plan_id}', 'API\TestController@result')->where(['plan_id'=>'[0-9]+']);
});
