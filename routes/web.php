<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Временная заглушка
// Route::get('/{page}', function ($page) {
//     return view($page);
// });

/*
 * Закрытая часть для учеников
 */
Route::group(['prefix'=>'course','middleware' => ['auth']], function()
{
    Route::get('/', function() {
        return view('course.home');
    })->name('course.home');
});


/*
 * Админка
 */
Route::group(['prefix'=>'admin','middleware' => ['auth']], function()
{

    Route::get('/home', function() {
        return view('admin.home');
    })->name('home');

    Route::get('/staff', function() {
        return view('admin.staff');
    })->name('staff');

    Route::get('/groups', function() {
        return view('admin.groups');
    })->name('groups');

    Route::get('/plans', function() {
        return view('admin.plans');
    })->name('plans');

    Route::get('/groupinf', function() {
        return view('admin.groupinf');
    })->name('groupinf');

    Route::get('/plansinf', function() {
        return view('admin.plansinf');
    })->name('plansinf');
});


/*
 * Админка для суперадминов
 */
Route::group(['prefix'=>'sa','middleware' => ['auth']], function()
{
    Route::get('/', function() {
        return view('sa.home');
    })->name('sa.home');
});