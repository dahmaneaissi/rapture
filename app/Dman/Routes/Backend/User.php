<?php
    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    |
    |
    */

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'users.index' , 'uses' => 'UserController@getIndex']);
        Route::get('create', [ 'as' => 'users.create' , 'uses' => 'UserController@getCreate']);
        Route::post('save', [ 'as' => 'users.save' , 'uses' => 'UserController@postSave']);
        Route::get('{id}/edit', [ 'as' => 'users.edit' , 'uses' => 'UserController@getEdit']);
        Route::put('update/{id}', [ 'as' => 'users.update' , 'uses' => 'UserController@putUpdate']);
        Route::get('destroy/{id}', [ 'as' => 'users.delete' , 'uses' => 'UserController@getDestroy']);
        Route::get('search', [ 'as' => 'users.search' , 'uses' => 'UserController@getSearch']);
        Route::get('logout', ['as' => 'users.logout' , 'uses' => 'UserController@getLogout']);
    });