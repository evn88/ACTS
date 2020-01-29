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

use App\Role;

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

    Route::get('/plansinf', function() {
        return view('course.plansinf');
    })->name('course.plansinf');

    Route::get('/lesson', function() {
        return view('course.lesson');
    })->name('course.lesson');

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

Route::get('/catchpage', function() {
    return view('catchpages.template1');
})->name('catchpages.template1');

/*
 * Админка
 */
Route::group(['prefix'=>'admin','middleware' => ['auth','can:admin']], function()
{

    Route::get('/', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('staff', 'Admin\StaffController');
    Route::get('/staff/{id}/delete', 'Admin\StaffController@destroy');

    Route::resource('groups', 'Admin\GroupController');
    Route::resource('plans', 'Admin\PlansController');
    Route::resource('lessons', 'Admin\LessonsController');
    Route::resource('tests', 'Admin\TestsController');
    Route::resource('attacks', 'Admin\AttacksController');
    Route::get('lessons/create/{lesson}', 'Admin\LessonsController@create')->name('lessons.create');


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