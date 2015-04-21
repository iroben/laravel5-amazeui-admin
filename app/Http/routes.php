<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@doLogin');
Route::get('logout', 'AuthController@logout');
Route::get('/', 'AuthController@login');

Route::group(array('middleware' => 'permission'), function () {

    Route::get('home', 'HomeController@index');
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('action', 'ActionController');
    Route::resource('test1', 'Test1Controller');
    Route::resource('test2', 'Test2Controller');
});

//Route::controllers([
//    'auth'     => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);
