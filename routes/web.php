<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

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
