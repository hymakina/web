<?php

Route::group(['middleware' => ['admin']], function () {
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@postLogin']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@getLogout']);

    Route::get('password/reset', ['as' => 'password.request', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.update', 'uses' => 'Auth\ResetPasswordController@reset'])->name('');
});

Route::group(['middleware' => ['admin', 'auth:admin']], function () {

    Route::prefix('admin')->group(function() {
        Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);
        Route::get('/show/{admin}', ['as' => 'show', 'uses' => 'AdminController@show']);

        Route::get('/create', ['as' => 'create', 'uses' => 'AdminController@create']);
        Route::post('/create', ['as' => 'store', 'uses' => 'AdminController@store']);
        Route::get('/delete/{admin}', ['as' => 'delete', 'uses' => 'AdminController@destroy']);
        Route::get('/edit/{admin}', ['as' => 'edit', 'uses' => 'AdminController@edit']);
        Route::post('/edit/{admin}', ['as' => 'update', 'uses' => 'AdminController@update']);
    });

    Route::prefix('me')->group(function() {
        Route::get('/', ['as' => 'me.index', 'uses' => 'MeController@index']);
        Route::post('/edit', ['as' => 'me.update', 'uses' => 'MeController@update']);
    });

});

