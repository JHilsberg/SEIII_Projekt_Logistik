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

Route::group(array('prefix' => LaravelLocalization::setLocale()), function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('login', array('uses' => 'SessionController@showLogin'));

    Route::get('secure', array('before' => 'auth', function()
    {
        return View::make('secure');
    }));

    Route::get('logout', array('uses' => 'SessionController@doLogout'));

    Route::get('orderHistory', array('before' => 'auth', function(){
        return View::make('orderHistory')->with('orders',Order::all());
    }));

    Route::get('myAccount', array('before' => 'auth', function(){
        return View::make('myAccount');
    }));

    Route::get('edit/{id}', array('as'=>'edit','before' => 'auth',function(){
       $order=Order::find(Route::input('id'));
       return View::make('editOrder')
       ->with('order', $order);

    }));

    Route::post('editOrder/{id}',array('before' => 'auth','as' => 'editOrder', function($id) {

          //  $order=Order::find($id);

        return Redirect::route('edit', array('id' => $id));

       // return View::make('editOrder')
         //->with('order', $order);
    }));

    Route::post('handlePDF/{id}',array('before' => 'auth', 'uses' => 'PDFController@start', 'as' => 'handlePDF', function($id){}));

    Route::post('submitEditOrder/{id}',array('before' => 'auth', 'uses'=>'FormController@editSubmitted', 'as' => 'submitEditOrder', function($id) {

        //  $order=Order::find($id);

       // return Redirect::route('edit', array('id' => $id));

        // return View::make('editOrder')
        //->with('order', $order);
    }));

});
Route::post('login', array('uses' => 'SessionController@doLogin'));

Route::post('account', array('uses' => 'accountViewController@validate'));

Route::post('transportauftrag', array('uses' => 'FormController@start'));

//Route::post('handlePDF',array('uses' => 'PDFController@start'));

