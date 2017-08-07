<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * BackEnd Routes Group
 */
Route::get('backend/users/logout', ['as' => 'users.logout' , 'uses' => 'UserController@getLogout']);
Route::group(['prefix' => 'backend' , 'middleware' => ['auth','acl']], function () {


    /**
     * Users
     */
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'users.index' , 'uses' => 'UserController@getIndex']);
        Route::get('create', [ 'as' => 'users.create' , 'uses' => 'UserController@getCreate']);
        Route::post('save', [ 'as' => 'users.save' , 'uses' => 'UserController@postSave']);
        Route::get('{id}/edit', [ 'as' => 'users.edit' , 'uses' => 'UserController@getEdit']);
        Route::put('update/{id}', [ 'as' => 'users.update' , 'uses' => 'UserController@putUpdate']);
        Route::get('destroy/{id}', [ 'as' => 'users.delete' , 'uses' => 'UserController@getDestroy']);
        Route::get('search', [ 'as' => 'users.search' , 'uses' => 'UserController@getSearch']);

    });

    /**
     * Entities
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

    /**
     * Roles
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

    /**
     * Permissions
     */
    Route::group(['prefix' => 'permissions'], function () {
        Route::get('/', [
            'as' => 'permissions.index' ,
            'uses' => 'Admin\Access\PermissionController@getIndex'
        ]);
        Route::get('create', [ 'as' => 'permissions.create' , 'uses' => 'Admin\Access\PermissionController@getCreate']);
        Route::post('save', [ 'as' => 'permissions.save' , 'uses' => 'Admin\Access\PermissionController@postSave']);
        Route::get('{id}/edit', [ 'as' => 'permissions.edit' , 'uses' => 'Admin\Access\PermissionController@getEdit']);
        Route::put('update/{id}', [ 'as' => 'permissions.update' , 'uses' => 'Admin\Access\PermissionController@putUpdate']);
        Route::get('destroy/{id}', [ 'as' => 'permissions.delete' , 'uses' => 'Admin\Access\PermissionController@getDestroy']);
        Route::get('search', [ 'as' => 'permissions.search' , 'uses' => 'Admin\Access\PermissionController@getSearch']);
    });

    /**
     * Dashbord
     */
    Route::get('/', [ 'as' => 'dashbord.index' , 'uses' => 'Admin\DashboardController@getIndex', 'middleware' => 'acl:show-dashbord' ]);

});







/*Route::controller('admin',
    'Admin\UserController',
    array(
        'getIndex' => 'users',
        'postSave' => 'post.user'
    )
);*/

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


/*-----------------
    Frontend
-----------------*/

// inscription
Route::post('inscription' , array('as' => 'inscription', 'uses' =>  'FrontEndController@getSignin') ) ;
Route::get('inscription' , array('as' => 'inscription', 'uses' =>  'FrontEndController@getSignin') ) ;

Form::macro('date', function() {
    return '<input class="form-control" name="birthday" type="date" autocomplete="off">';
});
