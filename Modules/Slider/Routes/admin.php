<?php

Route::get('/', ['as' => 'index', 'uses' => 'SliderController@index']);
Route::get('/create', ['as' => 'create', 'uses' => 'SliderController@create']);
Route::post('/create', ['as' => 'store', 'uses' => 'SliderController@store']);
Route::get('/edit/{slider}', ['as' => 'edit', 'uses' => 'SliderController@edit']);
Route::post('/edit/{slider}', ['as' => 'update', 'uses' => 'SliderController@update']);
Route::get('/delete/{slider}', ['as' => 'delete', 'uses' => 'SliderController@destroy']);

Route::group(['prefix' => 'image', 'as' => 'image.'], function() {
    Route::get('/{slider}', ['as' => 'index', 'uses' => 'SliderImageController@index']);
    Route::get('/create/{slider}', ['as' => 'create', 'uses' => 'SliderImageController@create']);
    Route::post('/create/{slider}', ['as' => 'store', 'uses' => 'SliderImageController@store']);
    Route::get('/edit/{slider}/{slider_image}', ['as' => 'edit', 'uses' => 'SliderImageController@edit']);
    Route::post('/edit/{slider}/{slider_image}', ['as' => 'update', 'uses' => 'SliderImageController@update']);
    Route::get('/delete/{slider}/{slider_image}', ['as' => 'delete', 'uses' => 'SliderImageController@destroy']);
});
