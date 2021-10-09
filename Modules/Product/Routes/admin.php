<?php

Route::group(['prefix' => 'category', 'as' => 'category.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'ProductCategoryController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'ProductCategoryController@create']);
    Route::post('/create', ['as' => 'store', 'uses' => 'ProductCategoryController@store']);
    Route::get('/edit/{product_category}', ['as' => 'edit', 'uses' => 'ProductCategoryController@edit']);
    Route::post('/edit/{product_category}', ['as' => 'update', 'uses' => 'ProductCategoryController@update']);
    Route::get('/delete/{product_category}', ['as' => 'delete', 'uses' => 'ProductCategoryController@destroy']);
});

Route::group(['prefix' => 'product', 'as' => 'product.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'ProductController@create']);
    Route::post('/create', ['as' => 'store', 'uses' => 'ProductController@store']);
    Route::get('/edit/{product}', ['as' => 'edit', 'uses' => 'ProductController@edit']);
    Route::post('/edit/{product}', ['as' => 'update', 'uses' => 'ProductController@update']);
    Route::get('/delete/{product}', ['as' => 'delete', 'uses' => 'ProductController@destroy']);
});

Route::group(['prefix' => '{product}/attribute', 'as' => 'product.attribute.'], function() {
    Route::post('/create', ['as' => 'store', 'uses' => 'ProductController@storeAttribute']);
    Route::get('/edit', ['as' => 'edit', 'uses' => 'ProductController@editAttribute']);
    Route::post('/edit/{product_product_attribute?}', ['as' => 'update', 'uses' => 'ProductController@updateAttribute']);
    Route::get('/delete/{product_product_attribute?}', ['as' => 'delete', 'uses' => 'ProductController@destroyAttribute']);
    Route::post('/order', ['as' => 'order', 'uses' => 'ProductController@order']);
});

Route::group(['prefix' => '{product}/image', 'as' => 'image.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'ProductImageController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'ProductImageController@create']);
    Route::post('/create', ['as' => 'store', 'uses' => 'ProductImageController@store']);
    Route::get('/edit/{product_image}', ['as' => 'edit', 'uses' => 'ProductImageController@edit']);
    Route::post('/edit/{product_image}', ['as' => 'update', 'uses' => 'ProductImageController@update']);
    Route::get('/delete/{product_image}', ['as' => 'delete', 'uses' => 'ProductImageController@destroy']);
    Route::post('/order', ['as' => 'order', 'uses' => 'ProductImageController@order']);
});

Route::group(['prefix' => 'attribute', 'as' => 'attribute.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'ProductAttributeController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'ProductAttributeController@create']);
    Route::post('/create', ['as' => 'store', 'uses' => 'ProductAttributeController@store']);
    Route::get('/edit/{product_attribute}', ['as' => 'edit', 'uses' => 'ProductAttributeController@edit']);
    Route::post('/edit/{product_attribute}', ['as' => 'update', 'uses' => 'ProductAttributeController@update']);
    Route::get('/delete/{product_attribute}', ['as' => 'delete', 'uses' => 'ProductAttributeController@destroy']);
});

Route::group(['prefix' => 'option', 'as' => 'option.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'ProductOptionController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'ProductOptionController@create']);
    Route::post('/create', ['as' => 'store', 'uses' => 'ProductOptionController@store']);
    Route::get('/edit/{product_option_key}', ['as' => 'edit', 'uses' => 'ProductOptionController@edit']);
    Route::post('/edit/{product_option_key}', ['as' => 'update', 'uses' => 'ProductOptionController@update']);
    Route::get('/delete/{product_option_key}', ['as' => 'delete', 'uses' => 'ProductOptionController@destroy']);
});

Route::group(['prefix' => '{product_option_key}/option', 'as' => 'option.value.'], function() {
    Route::post('/create', ['as' => 'store', 'uses' => 'ProductOptionController@storeValue']);
    Route::post('/edit/{product_option_key_value?}', ['as' => 'update', 'uses' => 'ProductOptionController@updateValue']);
    Route::get('/delete/{product_option_key_value?}', ['as' => 'delete', 'uses' => 'ProductOptionController@destroyValue']);
});