<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as' => 'index', 'uses' => 'MenuController@index']);
Route::get('/create', ['as' => 'create', 'uses' => 'MenuController@create']);
Route::post('/create', ['as' => 'store', 'uses' => 'MenuController@store']);
Route::get('/edit/{menu}', ['as' => 'edit', 'uses' => 'MenuController@edit']);
Route::post('/edit/{menu}', ['as' => 'update', 'uses' => 'MenuController@update']);
Route::get('/delete/{menu}', ['as' => 'delete', 'uses' => 'MenuController@destroy']);

Route::group(['prefix' => '{menu}/item', 'as' => 'item.'], function() {
Route::get('/', ['as' => 'index', 'uses' => 'MenuItemController@index']);
Route::get('/create', ['as' => 'create', 'uses' => 'MenuItemController@create']);
Route::post('/create', ['as' => 'store', 'uses' => 'MenuItemController@store']);
Route::get('/edit/{menu_item}', ['as' => 'edit', 'uses' => 'MenuItemController@edit']);
Route::post('/edit/{menu_item}', ['as' => 'update', 'uses' => 'MenuItemController@update']);
Route::get('/delete/{menu_item}', ['as' => 'delete', 'uses' => 'MenuItemController@destroy']);
Route::post('/order', ['as' => 'order', 'uses' => 'MenuItemController@order']);
});

