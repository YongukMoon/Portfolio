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

Route::get('/', 'WelcomeController@index');

//Locale
Route::get('locale', [
    'as'=>'locale',
    'uses'=>'WelcomeController@locale'
]);

//User register
Route::get('auth/register', [
    'as'=>'users.create',
    'uses'=>'UsersController@create'
]);

Route::post('auth/register', [
    'as'=>'users.store',
    'uses'=>'UsersController@store'
]);

Route::get('auth/confirm/{code}', [
    'as'=>'users.confirm',
    'uses'=>'UsersController@confirm'
])->where('code', '[\pL-\pN]{60}');

//User profile
Route::get('users/{user}/edit', [
    'as'=>'users.edit',
    'uses'=>'UsersController@edit'
]);

Route::patch('users/{user}', [
    'as'=>'users.update',
    'uses'=>'UsersController@update'
]);

//Password update
Route::get('passwords/{user}/edit', [
    'as'=>'passwords.edit',
    'uses'=>'UsersController@getPassword'
]);

Route::patch('passwords/{user}', [
    'as'=>'passwords.update',
    'uses'=>'UsersController@postPassword'
]);

//Password remind
Route::get('auth/remind', [
    'as'=>'remind.create',
    'uses'=>'PasswordsController@getRemind'
]);

Route::post('auth/remind', [
    'as'=>'remind.store',
    'uses'=>'PasswordsController@postRemind'
]);

Route::get('auth/reset/{token}', [
    'as'=>'reset.create',
    'uses'=>'PasswordsController@getReset'
])->where('token', '[\pL-\pN]{64}');

Route::post('auth/reset', [
    'as'=>'reset.store',
    'uses'=>'PasswordsController@postReset'
]);

//Login
Route::get('auth/login', [
    'as'=>'sessions.create',
    'uses'=>'SessionsController@create'
]);

Route::post('auth/login', [
    'as'=>'sessions.store',
    'uses'=>'SessionsController@store'
]);

//Logout
Route::get('auth/logout', [
    'as'=>'sessions.destroy',
    'uses'=>'SessionsController@destroy'
]);

//Social login
Route::get('social/{provider}', [
    'as'=>'social.login',
    'uses'=>'SocialController@execute'
]);

//Article
Route::resource('articles', 'ArticlesController');

//Tag
Route::get('articles/{slug}/tags', [
    'as'=>'articles.tags',
    'uses'=>'ArticlesController@index'
]);

//Attachment
Route::resource('attachments', 'AttachmentsController', ['only'=>['store', 'destroy']]);

//Comment
Route::resource('comments', 'CommentsController', ['only'=>['update', 'destroy']]);
Route::resource('articles.comments', 'CommentsController', ['only'=>'store']);

//Vote
Route::post('comments/{comment}/votes', [
    'as'=>'comments.votes',
    'uses'=>'CommentsController@vote'
]);

//Product
Route::get('products/{slug}/categories', [
    'as'=>'products.categories',
    'uses'=>'Shop\ProductsController@index'
]);

Route::resource('products', 'Shop\ProductsController');