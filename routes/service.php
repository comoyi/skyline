<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Service Routes
|--------------------------------------------------------------------------
|
| Here is where you can register service routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "service" middleware group. Enjoy building your service!
|
*/

// index
Route::get('/', 'IndexController@index');
