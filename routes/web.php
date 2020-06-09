<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', function () {
    event(new \App\Events\Users\UserWasCreated(\App\Models\User::first()));
    //    \Illuminate\Support\Facades\Cache::put('app.presentation.name', 'Anvil Course');
//    \Illuminate\Support\Facades\Cache::put('app.presentation.logo', url('img/app-logo.png'));
});
Route::namespace('Administration')
    ->name('administration.')
    ->middleware('auth:administrator')
    ->prefix('administration')
    ->group(function () {
        Route::view('/', 'administration.home.home')->name('home');
        /**
         * Users Routes
         */
        Route::resource('users', 'Users\\UserController');
});
