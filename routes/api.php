<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/technologies', 'TechnologyApiController@store')->name('tecnologyStore');;
Route::put('/technologies/{id}', 'TechnologyApiController@update')->name('tecnologyPut');
Route::get('/technologies/{id}', 'TechnologyApiController@show')->name('tecnologyShow');
Route::delete('/technologies/{id}', 'TechnologyApiController@destroy')->name('tecnologyDelete');
