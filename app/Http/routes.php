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

Route::get('/','AccountsController@login');

Route::group(['middleware' => 'logs'], function () {
	Route::get('users/logs','UsersController@logs');
	Route::resource('users','UsersController');
	Route::get('users','UsersController@index');
	Route::get('api/users', array('as'=>'api.users', 'uses'=>'UsersController@getDatatable'));
	Route::get('users/create','UsersController@create');
	Route::post('users/createUser','UsersController@createUser');
	Route::get('users/{id}/edit','UsersController@edit');
	Route::put('users/{id}','UsersController@update');
	Route::get('users/{id}/destroy','UsersController@destroy');

	Route::get('accounts/logout','AccountsController@logout');
	Route::get('accounts/login','AccountsController@login');
	Route::post('accounts/userLogin','AccountsController@userLogin');
	Route::get('accounts/dashboard','AccountsController@dashboard');
	Route::get('accounts/halt','AccountsController@halt');
	Route::get('accounts/registration','AccountsController@registration');
	Route::post('accounts/registerAccount','AccountsController@registerAccount');
	Route::get('accounts/registrationSuccess','AccountsController@registrationSuccess');
	Route::get('accounts/registrationFailed','AccountsController@registrationFailed');
});

Route::group(['middleware'=>'auth'],function(){
	Route::get('accounts/dashboard','AccountsController@dashboard');
	Route::get('users','UsersController@index');
	Route::get('api/users', array('as'=>'api.users', 'uses'=>'UsersController@getDatatable'));
	Route::get('users/create','UsersController@create');
	Route::post('users/createUser','UsersController@createUser');
	Route::get('users/{id}/edit','UsersController@edit');
	Route::put('users/{id}','UsersController@update');
	Route::get('users/{id}/destroy','UsersController@destroy');
});
	
Route::get('about','PagesController@about');
Route::get('contact','PagesController@contact');
Route::get('articles','ArticlesController@index');
Route::get('articles/{id}','ArticlesController@show');
Route::get('articles/create','ArticlesController@create');
Route::get('records','RecordsController@index');
Route::get('records/add','RecordsController@create');
Route::get('records/display','RecordsController@getAllRecords');
Route::post('records/process_add', 'RecordsController@process_add');
