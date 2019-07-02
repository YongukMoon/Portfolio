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

Route::get('auth/register', [
    'as'=>'users.create',
    'uses'=>'UsersController@create'
]);

Route::post('auth/register', [
    'as'=>'users.store',
    'uses'=>'UsersController@store'
]);