<?php

    Route::get('/',          ['as' => 'index', 'uses' => 'SettingController@index']);
    Route::post('edit',     ['as' => 'edit', 'uses' => 'SettingController@update']);