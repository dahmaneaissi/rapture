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
 * Backend Routes Group
 */

Route::group( [ 'prefix' => 'backend' ] , function () {

    /**
     * Users
     */
    require( app_path() . '/Dman/Routes/Backend/User.php' );

    /**
     * Entities
     */
    require( app_path() . '/Dman/Routes/Backend/Entity.php' );

    /**
     * Roles
     */
    require( app_path() . '/Dman/Routes/Backend/Role.php' );

    /**
     * Permissions
     */
    require( app_path() . '/Dman/Routes/Backend/Permission.php' );

    /**
     * Dashbord
     */
    require( app_path() . '/Dman/Routes/Backend/Dashbord.php' );
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
