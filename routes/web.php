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
Auth::routes(['verify' => true]);


Route::get('/', function () {
    return view('welcome');
});
Route::get('/catchpage', function() {
    return view('catchpages.template1');
})->name('catchpages.template1');


/*
 * Закрытая часть для учеников
 */
Route::group(['prefix'=>'course','middleware' => ['auth','verified']], function()
{
    Route::get('/', 'Course\HomeController@index')->name('course.home');
    Route::get('/materials', 'Course\MaterialsController@index')->name('course.materials');
    Route::get('/plans/{plan}', 'Course\PlansController@show')->name('course.plans');
    Route::get('/lessons/{id}', 'Course\LessonsController@show')->name('course.lessons');

    Route::get('/tests/{plan_id}', 'Course\TestsController@show')->name('course.tests');

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
Route::group(['prefix'=>'admin','middleware' => ['auth','can:admin']], function()
{
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');

    Route::resource('staff', 'Admin\StaffController');
    Route::get('/staff/{id}/delete', 'Admin\StaffController@destroy');

    Route::resource('groups', 'Admin\GroupController');
    Route::resource('plans', 'Admin\PlansController');
    Route::resource('lessons', 'Admin\LessonsController');
    Route::get('lessons/create/{lesson}', 'Admin\LessonsController@create')->name('lessons.create');
    Route::resource('tests', 'Admin\TestsController');
    Route::get('tests/create/{tests}', 'Admin\TestsController@create')->name('tests.create');
    Route::resource('attacks', 'Admin\AttacksController');
    Route::get('attacks/create/{attacks}', 'Admin\AttacksController@create')->name('attacks.create');


    Route::get('/reports', function() {
        return view('admin.reports');
    })->name('admin.reports');
});


