<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	
	Route::get('/', function () {
		return view('welcome');
	})->middleware('guest');

	// // Events
	// Route::get('/events', 'EventController@index');
	// Route::post('/event', 'EventController@store');
	// Route::delete('/event/{event}', 'EventController@destroy');

	// // Templates
	// Route::get('/templates', 'TemplateController@index');
	// Route::get('/templates/{template}', 'TemplateController@show');
	// Route::post('/template', 'TemplateController@store');
	// Route::delete('/template/{template}', 'TemplateController@destroy');

	Route::resource('events', 'EventController');
	Route::resource('templates', 'TemplateController');

	// Authentication Routes
	Route::auth();
});