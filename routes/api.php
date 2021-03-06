<?php

use Illuminate\Http\Request;

Route::prefix('auth')->group(function (){
    Route::post('register', 'API\AuthController@register');

    Route::middleware('api')->group(function () {
        Route::post('login', 'API\AuthController@login')->name('login');
        Route::post('logout', 'API\AuthController@logout');
        Route::post('refresh', 'API\AuthController@refresh');
        Route::post('me', 'API\AuthController@me');
    });
});

Route::prefix('property')->group(function () {
    Route::post('{user}/store', 'API\PropertyAdvertController@store');
    Route::post('{property}/upload-image', 'API\PropertyAdvertController@UploadAdvertImage');
    Route::post('{property}/payment', 'API\PropertyAdvertController@ProcessAdvertPayment');
    Route::post('{user}/mail', 'API\PropertyAdvertController@mail');

    Route::get('{property}/show', 'API\PropertyController@show');
    Route::get('{user}/all', 'API\PropertyController@all');
    Route::get('{property}/edit', 'API\PropertyController@edit');
    Route::put('{property}/update', 'API\PropertyController@update');

    Route::post('star/{property}/{user}', 'API\StarredPropertyController@star');
    Route::delete('unstar/{property}/{user}', 'API\StarredPropertyController@unstar');
    Route::get('starredProperties/{user}', 'API\StarredPropertyController@getStarredProperties');
});

Route::post('/search', 'API\PropertySearchController@filter');


// Route::get('home', function() {return 'home';})->name('home');
