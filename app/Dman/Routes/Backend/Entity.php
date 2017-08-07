<?php
    /*
    |--------------------------------------------------------------------------
    | Entity Routes
    |--------------------------------------------------------------------------
    |
    |
    */

    Route::group(['prefix' => 'entities'], function () {
        Route::get('/', ['as' => 'entities.index' , 'uses' => 'EntityController@getIndex']);
        Route::get('create', [ 'as' => 'entities.create' , 'uses' => 'EntityController@getCreate']);
        Route::post('save', [ 'as' => 'entities.save' , 'uses' => 'EntityController@postSave']);
        Route::get('{id}/edit', [ 'as' => 'entities.edit' , 'uses' => 'EntityController@getEdit']);
        Route::put('update/{id}', [ 'as' => 'entities.update' , 'uses' => 'EntityController@putUpdate']);
        Route::get('destroy/{id}', [ 'as' => 'entities.delete' , 'uses' => 'EntityController@getDestroy']);
        Route::get('search', [ 'as' => 'entities.search' , 'uses' => 'EntityController@getSearch']);
    });