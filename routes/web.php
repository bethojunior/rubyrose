<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});


//Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'user'], function () {
        Route::group(['as' => 'user'], function () {
            Route::get('', 'User\UserController@index')->name('.index');
            Route::get('create','User\UserController@create')->name('.create');
            Route::post('insert', 'User\UserController@insert')->name('.insert');
        });
    });

//});

