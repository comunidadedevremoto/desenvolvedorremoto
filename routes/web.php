<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('tecnology');
Route::get('/technology/{id}', 'TechnologyController@show')->name('tecnology');
Route::get('/technology/{id}/edit', 'TechnologyController@edit')->name('tecnologyEdit');
Route::put('/technology/{id}/update', 'TechnologyController@update')->name('tecnologyPut');
