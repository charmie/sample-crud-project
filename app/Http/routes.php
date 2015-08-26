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

Route::get('/', function () {
	return view('welcome');

	/*
	$name = 'Ms. Charm';
    return view('welcome')->with('ngalan',$name);
    */
    /*
    $users = DB::table('users')->get();
    return $users;
    */
    /*
    $user = DB::table('users')->find(1);
    dd($user->username);
	*/
    /*
	$users = DB::table('users')->where('username','!=','strat_emp1')->get();
	return $users;
	*/
	/*
	$users = App\User::where('username','!=', 'strat_emp1')->get();;
	$users = App\User::all();
	return $users;
	*/
	/*
	$user = new App\User;
	$user->username = 'strat_emp3';
	$user->password = Hash::make('password');
	$user->save();
	return App\User::all();
	*/
	/*
	// CREATE
	App\User::create([
		'username' => 'strat_emp4',
		'password' => Hash::make('password')
	]); // -- for mass assignment

	return App\User::all();
	*/
	/*
	//UPDATE
	$user = App\User::find(4);
	$user->username = 'duplicate entry';
	$user->save();

	return App\User::all();
	*/
	/*
	//DELETE
	$user = App\User::find(4);
	$user->delete();
	return App\User::all();
	*/
	/*
	//GET USERS IN DESIRED ORDER
	return App\User::orderBy('created_at','desc')->take(3)->get();
	*/
    
});


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

	
});

Route::group(['middleware'=>'auth'],function(){
	Route::get('accounts/dashboard','AccountsController@dashboard');
	//Route::resource('users','UsersController');
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
