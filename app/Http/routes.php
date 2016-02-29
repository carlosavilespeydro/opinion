<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web','auth']], function () {

    Route::get('/sugerencia/new', [
        'uses' => 'ProposalController@newProposal',
        'as'   => 'proposal_new_path',
    ]);

    Route::post('sugerencia/new', [
        'uses' => 'ProposalController@storeProposal',
        'as'   => 'proposal_store_path',
    ]);

    Route::get('user', [
        'uses' => 'UserController@showUser',
        'as'   => 'user_show_path',
    ]);

    Route::get('sugerencia/delete/{id}', [
        'uses' => 'ProposalController@deleteProposal',
        'as'   => 'proposal_delete_path',
    ]);

    Route::get('sugerencia/edit/{id}', [
        'uses' => 'ProposalController@editProposal',
        'as'   => 'proposal_edit_path',
    ]);
    Route::patch('sugerencia/edit/{id}', [
        'uses' => 'ProposalController@update',
        'as'   => 'proposal_update_path',
    ]);

});


Route::group(['middleware' => ['web']], function () {

    //ruta principal
    Route::get('/', [
        'uses' => 'HomeController@index',
        'as'   => 'home_path',
    ]);


    //ruta que muestra la sugerencia
    Route::get('/sugerencia/{id}', [
        'uses' => 'ProposalController@show',
        'as'   => 'proposal_show_path',
    ]);

    //ruta de login
    Route::get('auth/login', [
        'uses' => 'AuthController@index',
        'as'   => 'auth_show_path',
    ]);

    Route::post('auth/login', [
        'uses' => 'AuthController@store',
        'as'   => 'auth_store_path',
    ]);


    //ruta a crear usuario
    Route::get('newUser', [
        'uses' => 'UserController@create',
        'as'   => 'user_new_path',
    ]);


    //ruta para crear usuario
    Route::post('newUser/new', [
        'uses' => 'UserController@newUser',
        'as'   => 'user_create_path',
    ]);/**/

    //ruta para logout
    Route::get('auth/logout', [
        'uses' => 'AuthController@destroy',
        'as'   => 'auth_destroy_path',
    ]);


});



