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

Route::get('/', 'HomeController@home');
Route::get('/team', 'HomeController@home');
Route::get('/apply', 'HomeController@home');
Route::get('/streams', 'HomeController@home');
Route::get('/login', ['as' => 'login', 'uses' => 'HomeController@home']);


Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function()
{
    Route::get('/', 'DashboardController@index');
    Route::get('/team', 'DashboardController@index');
    Route::get('/applications', 'DashboardController@index');
    Route::get('/recruitment', 'DashboardController@index');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Api\Admin', 'prefix' => 'api/admin'], function()
{
    Route::resource('players', 'PlayersController');
    Route::resource('recruitment', 'RecruitmentController', ['only' => ['index', 'update']]);
    Route::resource('applications', 'ApplicationsController', ['only' => ['index']]);

    Route::put('/applications/{id}/accept', 'ApplicationsController@accept');
    Route::put('/applications/{id}/deny', 'ApplicationsController@deny');
    Route::put('/applications/{id}/assign', 'ApplicationsController@assign');
});
