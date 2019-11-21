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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function() {
    return view('home');
})->name('home');

Route::get('/staff', function() {
    return view('staff');
})->name('staff');

Route::get('/groups', function() {
    return view('groups');
})->name('groups');

Route::get('/plans', function() {
    return view('plans');
})->name('plans');

Route::get('/groupinf', function() {
    return view('groupinf');
})->name('groupinf');