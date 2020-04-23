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
Route::namespace('API')->name('api.')->middleware('needsRole:Admin|User,true')->group(function () {
    Route::resource('addresses', 'AddressController')
        ->except([
            'create', 'edit', 'index', 'show'
        ]);
    Route::get('addresses/{relationships?}','AddressController@index')
        ->where('relationships', '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*')
        ->name('addresses.index');
    Route::get('addresses/{id}/{relationships?}','AddressController@show')
        ->where(['id' => '[0-9]+', 'relationships' => '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*'])
        ->name('addresses.show');
    Route::resource('categories', 'CategoryController')
        ->except([
            'create', 'edit', 'index', 'show'
        ]);
    Route::get('categories/{relationships?}','CategoryController@index')
        ->where('relationships', '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*')
        ->name('categories.index');
    Route::get('categories/{id}/{relationships?}','CategoryController@show')
        ->where(['id' => '[0-9]+', 'relationships' => '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*'])
        ->name('categories.show');
    Route::resource('coupons', 'CouponController')
        ->except([
            'create', 'edit', 'index', 'show'
        ]);
    Route::get('coupons/{relationships?}','CategoryController@index')
        ->where('relationships', '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*')
        ->name('coupons.index');
    Route::get('coupons/{id}/{relationships?}','CategoryController@show')
        ->where(['id' => '[0-9]+', 'relationships' => '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*'])
        ->name('coupons.show');
    Route::resource('establishments', 'EstablishmentController')
        ->except([
            'create', 'edit', 'index', 'show'
        ]);
    Route::get('establishments/type/{type}/{relationships?}','EstablishmentController@establishment')
        ->where([
            'type' => '^(?:(?:(?:(?:restaurant))|(?:(?:marketplace))|(?:(?:lunch))|(?:(?:drugstore))))',
            'relationships' => '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*'
        ])
        ->name('establishments.establishment');
    Route::get('establishments/paginate/{relationships?}','EstablishmentController@paginate')
        ->where('relationships', '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*')
        ->name('establishments.paginate');
    Route::get('establishments/{relationships?}','EstablishmentController@index')
        ->where('relationships', '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*')
        ->name('establishments.index');
    Route::get('establishments/{id}/{relationships?}','EstablishmentController@show')
        ->where(['id' => '[0-9]+', 'relationships' => '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*'])
        ->name('establishments.show');
    Route::resource('orders', 'OrderController')
        ->except([
            'create', 'edit', 'index', 'show'
        ]);
    Route::get('orders/{relationships?}','OrderController@index')
        ->where('relationships', '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*')
        ->name('orders.index');
    Route::get('orders/{id}/{relationships?}','OrderController@show')
        ->where(['id' => '[0-9]+', 'relationships' => '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*'])
        ->name('orders.show');
    Route::resource('products', 'ProductController')
        ->except([
            'create', 'edit', 'index', 'show'
        ]);
    Route::get('products/{relationships?}','ProductController@index')
        ->where('relationships', '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*')
        ->name('products.index');
    Route::get('products/{id}/{relationships?}','ProductController@show')
        ->where(['id' => '[0-9]+', 'relationships' => '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*'])
        ->name('products.show');
    Route::resource('users', 'UserController')
        ->except([
            'create', 'edit', 'index', 'show'
        ]);
    Route::get('promotions', 'ProductController@promotions')
        ->name('promotions');

    Route::get('users/{relationships?}','UserController@index')
        ->where('relationships', '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*')
        ->name('users.index');
    Route::get('users/{id}/{relationships?}','UserController@show')
        ->where(['id' => '[0-9]+', 'relationships' => '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*'])
        ->name('users.show');
    Route::get('user/current/{relationships?}','UserController@current')
        ->where('relationships', '^\w+((?:(?:\-)?)|(?:(?:\.)?)\w+)*')
        ->name('user.current');
});
