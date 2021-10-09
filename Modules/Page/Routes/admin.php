<?php

Route::group(['prefix' => 'category', 'as' => 'category.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'PageCategoryController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'PageCategoryController@create']);
    Route::post('/create', ['as' => 'store', 'uses' => 'PageCategoryController@store']);
    Route::get('/edit/{page_category}', ['as' => 'edit', 'uses' => 'PageCategoryController@edit']);
    Route::post('/edit/{page_category}', ['as' => 'update', 'uses' => 'PageCategoryController@update']);
    Route::get('/delete/{page_category}', ['as' => 'delete', 'uses' => 'PageCategoryController@destroy']);
});

Route::group(['prefix' => 'post', 'as' => 'post.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'PageController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'PageController@create']);
    Route::post('/create', ['as' => 'store', 'uses' => 'PageController@store']);
    Route::get('/edit/{page}', ['as' => 'edit', 'uses' => 'PageController@edit']);
    Route::post('/edit/{page}', ['as' => 'update', 'uses' => 'PageController@update']);
    Route::get('/delete/{page}', ['as' => 'delete', 'uses' => 'PageController@destroy']);
});