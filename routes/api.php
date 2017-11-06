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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/recruitment', 'Api\RecruitmentController', ['only' => 'index']);
Route::resource('/application', 'Api\ApplicationController', ['only' => 'store']);

Route::get('/classes', 'Api\PlayerClassesController@index');
Route::get('/team', 'Api\TeamController@index');
