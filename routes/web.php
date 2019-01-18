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

// Si entra por la principal, redirige a login
Route::get('/', function () {
    return redirect('/login');
});

// route to show the login form
Route::get('/login', array('uses' => 'loginController@showLogin'));

// route to process the form
Route::post('/login', array('uses' => 'loginController@doLogin'));