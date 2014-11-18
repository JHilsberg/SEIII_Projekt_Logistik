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


Route::get('secure', function()
{
    if (Auth::check()) {
        return View::make('secure');
    }else{
        echo 'You are not authorized to view this content!';
    }
});

// route to show the login form
Route::get('login', array('uses' => 'SessionController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'SessionController@doLogin'));

Route::get('logout', array('uses' => 'SessionController@doLogout'));
