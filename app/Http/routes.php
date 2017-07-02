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


Route::group(['prefix' => 'backend'], function () {

    Route::controller('users',
        'UserController',
        array(
            'getIndex' => 'users.list'
        )
    );

    /**
     * Entities
     */
    Route::group(['prefix' => 'entities'], function () {
        Route::get('/', [
            'as' => 'entities.list' ,
            'uses' => 'EntityController@getIndex' ,
            'middleware' => 'permissions:sdsds,fdfd'
        ]);
        Route::get('create', [ 'as' => 'entities.create' , 'uses' => 'EntityController@getCreate']);
        Route::post('save', [ 'as' => 'entities.save' , 'uses' => 'EntityController@postSave']);
        Route::get('{id}/edit', [ 'as' => 'entities.edit' , 'uses' => 'EntityController@getEdit']);
        Route::put('update/{id}', [ 'as' => 'entities.update' , 'uses' => 'EntityController@putUpdate']);
        Route::get('destroy/{id}', [ 'as' => 'entities.delete' , 'uses' => 'EntityController@getDestroy']);
        Route::get('search/{q}', [ 'as' => 'entities.search' , 'uses' => 'EntityController@getSearch']);
    });


    Route::controller('/',
        'Admin\DashboardController',
        array(
            'getIndex' => 'dashbord.index'
        )
    );

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
