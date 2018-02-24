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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register/stem', function () {
    return view('auth/register');
});

Route::get('/register/class', function () {
    return view('auth/class');
});

// Pages Controller
Route::get('/app/{any}', 'PagesController@index')->where('any', '.*');

// Api Controller
Route::get('/get_twilio_token', 'ApiController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

