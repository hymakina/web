<?php

Route::group(['middleware' => 'web', 'prefix' => \Loc::getRoutePrefix(), 'as' => 'frontend.'], function() {

    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function() {
        Route::get('/{contact_slug}', ['as' => 'show', 'uses' => 'ContactController@show']);
        Route::post('/{contact_slug}/form/submit', ['as' => 'form.submit', 'uses' => 'ContactController@postForm']);
    });

    Route::group(['as' => 'page.'], function() {
        Route::get('{page_slug}', ['as' => 'show', 'uses' => 'PageController@show']);
    });

    Route::group(['prefix' => 'urun', 'as' => 'product.', 'namespace' => 'Product'], function() {
        Route::get('/katalog', ['as' => 'catalog', 'uses' => 'ProductController@catalog']);
        Route::get('/{product_category_slug}', ['as' => 'category', 'uses' => 'ProductController@index']);
        Route::post('/{product_category_slug}', ['as' => 'search', 'uses' => 'ProductController@search']);
    });

});