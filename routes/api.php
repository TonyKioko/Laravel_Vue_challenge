<?php

use Illuminate\Http\Request;

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('/products', 'ProductController@index');
Route::post('/upload-file', 'ProductController@uploadFile');
Route::get('/products/{product}', 'ProductController@show');



Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/users', 'UserController@index');
    Route::get('users/{user}', 'UserController@show');
    Route::patch('users/{user}', 'UserController@update');
    Route::get('users/{user}/orders', 'UserController@showOrders');
    Route::patch('products/{product}/qauntity/add', 'ProductController@updateUnits');
});

Route::post('/products', 'ProductController@store');
// Route::resource('/products', 'ProductController')->except(['index', 'show']);
// Route::resource('/products', 'ProductController')->except(['index', 'show']);

Route::resource('/orders', 'OrderController');
Route::resource('/suppliers', 'SupplierController');

