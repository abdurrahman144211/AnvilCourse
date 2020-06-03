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
    \App\Events\Users\UserWasCreated::dispatch(\App\Models\User::first());
//    event(new \App\Events\Users\UserWasCreated(\App\Models\User::first()));
});
Route::namespace('Administration')
    ->name('administration.')
    ->middleware('auth:administrator')
    ->prefix('administration')
    ->group(function () {
        Route::get('/', function () {})->name('home');
        /**
         * Users Routes
         */
        Route::resource('users', 'Users\\UserController');
});
