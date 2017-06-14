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

    Route::controller('entities',
        'EntityController',
        array(
            'getIndex'      => 'entities.list',
            'getCreate'     => 'entities.create',
            'postSave'      => 'entities.save',
            'getEdit'       => 'entities.edit',
            'putUpdate'     => 'entities.update',
            'getDestroy'    => 'entities.delete',
            'getSearch'     => 'entities.search',
        )
    );

    //Route::get('entities/edit/{id}', 'EntityController@getEdit');

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
