<?php

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

//category
Route::post('/category','Api\CategoryController@store');
Route::get('/all-category','Api\CategoryController@index');
Route::get('/delete-category/{id}','Api\CategoryController@destroy');
Route::get('/show-category/{id}','Api\CategoryController@show');
Route::post('/update-category/{id}','Api\CategoryController@update');
//subcategory
Route::post('/subcategory','Api\SubcategoryController@store');
Route::get('/all-subcategory','Api\SubcategoryController@index');
Route::get('/delete-subcategory/{id}','Api\SubcategoryController@destroy');
Route::get('/show-subcategory/{id}','Api\SubcategoryController@show');
Route::post('/update-subcategory/{id}','Api\SubcategoryController@update');
//coupon
Route::post('/coupon','Api\CouponController@store');
Route::get('/all-coupon','Api\CouponController@index');
Route::get('/delete-coupon/{id}','Api\CouponController@destroy');
Route::get('/show-coupon/{id}','Api\CouponController@show');
Route::post('/update-coupon/{id}','Api\CouponController@update');
//brand
Route::post('/brand','Api\BrandController@store');
Route::get('/all-brand','Api\BrandController@index');
Route::get('/delete-brand/{id}','Api\BrandController@destroy');
Route::get('/show-brand/{id}','Api\BrandController@show');
Route::post('/update-brand/{id}','Api\BrandController@update');
//product
Route::post('/product','Api\ProductController@store');
Route::get('/all-product','Api\ProductController@index');

