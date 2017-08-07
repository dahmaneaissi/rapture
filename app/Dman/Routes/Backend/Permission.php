<?php
    /*
    |--------------------------------------------------------------------------
    | Permission Routes
    |--------------------------------------------------------------------------
    |
    |
    */
    Route::group(['prefix' => 'permissions'], function () {
        Route::get('/', ['as' => 'permissions.index' ,'uses' => 'Admin\Access\PermissionController@getIndex']);
        Route::get('create', [ 'as' => 'permissions.create' , 'uses' => 'Admin\Access\PermissionController@getCreate']);
        Route::post('save', [ 'as' => 'permissions.save' , 'uses' => 'Admin\Access\PermissionController@postSave']);
        Route::get('{id}/edit', [ 'as' => 'permissions.edit' , 'uses' => 'Admin\Access\PermissionController@getEdit']);
        Route::put('update/{id}', [ 'as' => 'permissions.update' , 'uses' => 'Admin\Access\PermissionController@putUpdate']);
        Route::get('destroy/{id}', [ 'as' => 'permissions.delete' , 'uses' => 'Admin\Access\PermissionController@getDestroy']);
        Route::get('search', [ 'as' => 'permissions.search' , 'uses' => 'Admin\Access\PermissionController@getSearch']);
    });