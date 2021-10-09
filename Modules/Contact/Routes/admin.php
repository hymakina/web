<?php

Route::get('/', ['as' => 'index', 'uses' => 'ContactController@index']);
Route::get('/create', ['as' => 'create', 'uses' => 'ContactController@create']);
Route::post('/create', ['as' => 'store', 'uses' => 'ContactController@store']);
Route::get('/edit/{contact}', ['as' => 'edit', 'uses' => 'ContactController@edit']);
Route::post('/edit/{contact}', ['as' => 'update', 'uses' => 'ContactController@update']);
Route::get('/delete/{contact}', ['as' => 'delete', 'uses' => 'ContactController@destroy']);