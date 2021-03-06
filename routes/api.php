<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'user'], function () {
    Route::group(['as' => 'user'], function () {
        Route::delete('{id}','User\UserController@destroy');
    });
});

Route::group(['prefix' => 'typeProduct'], function () {
    Route::group(['as' => 'typeProduct'], function () {
        Route::delete('{id}', 'TypeProduct\TypeProductController@destroy')->name('.destroy');
    });
});

Route::group(['prefix' => 'productsImage'], function () {
    Route::group(['as' => 'productsImage'], function () {
        Route::delete('{id}', 'Products\ProductsController@deleteImage');
    });
});

Route::group(['prefix' => 'phone'], function () {
    Route::group(['as' => 'phone'], function () {
        Route::get('', 'Us\UsController@getPhone')->name('.getPhone');
    });
});
