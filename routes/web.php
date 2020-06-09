<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group([
    'namespace' => 'Administration',
    'middleware' => 'auth:administrator',
    'prefix' => 'administration',
], function () {
    Route::name('administration.')->group(function () {
        Route::view('/', 'administration.home.home')->name('home');
        /**
         * Users Routes
         */
        Route::resource('users', 'Users\\UserController');

        /**
         * Countries table
         */
    });
});

