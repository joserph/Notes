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
});

// Authentication routes...
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', [
	'as' => 'register',
	'uses' => 'Auth\AuthController@getRegister'
]);

Route::post('register', [
	'as' => 'register',
	'uses' => 'Auth\AuthController@postRegister'
]);

Route::get('/activate/{code}', [
	'as' => 'activate',
	'uses' => 'Auth\AuthController@getActivate'
]);

Route::get('login', [
	'as' => 'login',
	'uses' => 'Auth\AuthController@getLogin'
]);

Route::post('login', [
	'as' => 'login',
	'uses' => 'Auth\AuthController@postLogin'
]);


// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Admin
Route::resource('admin', 'AdminController');

// Users
Route::resource('users', 'UsersController');
// Notes
Route::resource('notes', 'NoteController');
Route::get('note', 'NoteController@getList');
// Activities
Route::resource('activities', 'ActivitiesController');
Route::get('activity', 'ActivitiesController@getList');
// Water
Route::resource('water', 'WaterController');
Route::get('wate', 'WaterController@getList');
// Light
Route::resource('lights', 'LightsController');
Route::get('light', 'LightsController@getList');
// Phone
Route::resource('phones', 'PhonesController');
Route::get('phone', 'PhonesController@getList');
// Social Security
Route::resource('securities', 'SocialSecurityController');
Route::get('security', 'SocialSecurityController@getList');
// Faov
Route::resource('faovs', 'FaovController');
Route::get('faov', 'FaovController@getList');
/*Route::get('/faovs', function()
{
	$faovs = App\Faov::latest()->get();
    return view('admin.faovs.index', compact('faovs'));
});*/