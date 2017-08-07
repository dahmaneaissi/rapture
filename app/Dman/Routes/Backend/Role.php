<?php
    /*
    |--------------------------------------------------------------------------
    | Role Routes
    |--------------------------------------------------------------------------
    |
    |
    */
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [
            'as' => 'roles.index' ,
            'uses' => 'Admin\Access\RoleController@getIndex'
        ]);
        Route::get('create', [ 'as' => 'roles.create' , 'uses' => 'Admin\Access\RoleController@getCreate']);
        Route::post('save', [ 'as' => 'roles.save' , 'uses' => 'Admin\Access\RoleController@postSave']);
        Route::get('{id}/edit', [ 'as' => 'roles.edit' , 'uses' => 'Admin\Access\RoleController@getEdit']);
        Route::put('update/{id}', [ 'as' => 'roles.update' , 'uses' => 'Admin\Access\RoleController@putUpdate']);
        Route::get('destroy/{id}', [ 'as' => 'roles.delete' , 'uses' => 'Admin\Access\RoleController@getDestroy']);
        Route::get('search', [ 'as' => 'roles.search' , 'uses' => 'Admin\Access\RoleController@getSearch']);
    });