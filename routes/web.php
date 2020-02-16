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

Route::get('/welcome', function () {
    return view('welcome');
});


// https://laravel.com/docs/6.x/middleware#middleware-groups
//verify middleware stiti sve ove route, a ne stiti welcome page i Auth::routes();
Route::middleware(['verified'])->group(function () {
    Route::get('/', 'TeamController@index');

    Route::get('/teams/{team}', 'TeamController@show');

    Route::get('/players/{player}', 'PlayerController@show');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/teams/{team}/comment', 'CommentController@store')->middleware('speechFilter');

    Route::get('/news', 'NewController@index');

    Route::get('/reports', 'ReportController@index');

    Route::get('/reports/{report}', 'ReportController@show');

    Route::get('/reports/team/{teamName}', 'ReportController@indexForSelectedTeam');
});

Auth::routes(['verify' => true]);