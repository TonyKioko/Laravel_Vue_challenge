<?php


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('/products', 'ProductController@index');
Route::post('/upload-file', 'ProductController@uploadFile');
Route::get('/products/{product}', 'ProductController@show');
// Route::get('/suppliers', 'SupplierController@index');
// Route::post('/suppliers', 'SupplierController@store');




Route::post('/products', 'ProductController@store');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/users', 'UserController@index');
    Route::get('users/{user}', 'UserController@show');
});
Route::resource('/suppliers', 'SupplierController');
Route::resource('/products', 'ProductController')->except(['index', 'show']);
Route::resource('/orders', 'OrderController');

// Route::resource('/products', 'ProductController')->except(['index', 'show']);


