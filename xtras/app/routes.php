<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('home', function()
{
    return View::make('home');
});
/**
Route::get('login', function()
{
    return View::make('login');
});
**/

// route to show the login form
Route::get('login', array('uses' => 'SessionController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'SessionController@doLogin'));

Route::get('logout', array('uses' => 'SessionController@doLogout'));