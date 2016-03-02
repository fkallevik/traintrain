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

	Route::resource('templates', 'TemplateController');
	Route::resource('templates.exercises', 'ExerciseController');
	Route::resource('sessions', 'SessionController');

	// Authentication Routes
	Route::auth();
});