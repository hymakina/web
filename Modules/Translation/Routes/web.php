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

    Route::group(['prefix' => 'translation', 'as' => 'translation.'], function () {

        Route::any('/save', ['as' => 'save', 'uses' => 'UiTranslationController@createOrUpdateForFrontend']);
        Route::any('/activate', ['as' => 'activate', 'uses' => 'UiTranslationController@activateTranslation']);
        Route::any('/deactivate', ['as' => 'deactivate', 'uses' => 'UiTranslationController@deactivateTranslation']);

    });
