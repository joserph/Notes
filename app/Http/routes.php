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
// Sumat
Route::resource('sumats', 'SumatController');
Route::get('sumat', 'SumatController@getList');
/**** I.V.A. *****/
// Forma 99035
Route::resource('iva99035s', 'Iva99035Controller');
Route::get('iva99035', 'Iva99035Controller@getList');
// Forma 99030
Route::resource('iva99030s', 'Iva99030Controller');
Route::get('iva99030', 'Iva99030Controller@getList');
/**** I.S.L.R. *****/
// Forma 99074
Route::resource('islr99074s', 'Islr99074Controller');
Route::get('islr99074', 'Islr99074Controller@getList');
// Forma 99228
Route::resource('islr99228s', 'Islr99228Controller');
Route::get('islr99228', 'Islr99228Controller@getList');