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

    Route::get('/materials', function() {
        return view('course.materials');
    })->name('course.materials');

    Route::get('/tests', function() {
        return view('course.tests');
    })->name('course.tests');

    Route::get('/journal', function() {
        return view('course.journal');
    })->name('course.journal');

    Route::get('/profile', function() {
        return view('course.profile');
    })->name('course.profile');


});


/*
 * Админка
 */
Route::group(['prefix'=>'admin','middleware' => ['auth','can:all']], function()
{

    Route::get('/', function() {
        return view('admin.home');
    })->name('admin.home');

    Route::resource('staff', 'Admin\StaffController', ['names' => [
        'index' => 'admin.staff'
    ]]);

    Route::get('/groups', function() {
        return view('admin.groups');
    })->name('admin.groups');

    Route::get('/plans', function() {
        return view('admin.plans');
    })->name('admin.plans');

    Route::get('/groupinf', function() {
        return view('admin.groupinf');
    })->name('admin.groupinf');

    Route::get('/plansinf', function() {
        return view('admin.plansinf');
    })->name('admin.plansinf');

    Route::get('/reports', function() {
        return view('admin.reports');
    })->name('admin.reports');
});