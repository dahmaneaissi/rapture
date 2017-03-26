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

Route::controller('admin/users',
    'Admin\UserController',
    array(
        'getIndex' => 'users',
        'postSave' => 'post.user'
    )
);

/*-----------------
    Frontend
-----------------*/

// inscription
Route::post('inscription' , array('as' => 'inscription', 'uses' =>  'FrontEndController@getSignin') ) ;
Route::get('inscription' , array('as' => 'inscription', 'uses' =>  'FrontEndController@getSignin') ) ;

Form::macro('date', function() {
    return '<input class="form-control" name="birthday" type="date" autocomplete="off">';
});
