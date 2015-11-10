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

\Event::subscribe('App\Subscriber\Auth');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function() { 

    
    Route::resource('roles', 'RolesController');
    
    Route::get('roles/{id}/delete', [
        'as' => 'roles.delete',
        'uses' => 'RolesController@destroy',
    ]);
    
    
    Route::resource('users', 'UsersController');
    
    Route::get('users/{id}/delete', [
        'as' => 'users.delete',
        'uses' => 'UsersController@destroy',
    ]);
    
    Route::resource('bitacoras', 'BitacoraController');
    
    Route::get('bitacoras/{id}/delete', [
        'as' => 'bitacoras.delete',
        'uses' => 'BitacoraController@destroy',
    ]);
}); //middleware auth    



Route::resource('api/carreras', 'API\CarrerasAPIController');

Route::resource('carreras', 'CarrerasController');

Route::get('carreras/{id}/delete', [
    'as' => 'carreras.delete',
    'uses' => 'CarrerasController@destroy',
]);


Route::resource('api/corredores', 'API\CorredoresAPIController');

Route::resource('corredores', 'CorredoresController');

Route::get('corredores/{id}/delete', [
    'as' => 'corredores.delete',
    'uses' => 'CorredoresController@destroy',
]);


Route::resource('api/ubicaciones', 'API\UbicacionesAPIController');

Route::resource('ubicaciones', 'UbicacionesController');

Route::get('ubicaciones/{id}/delete', [
    'as' => 'ubicaciones.delete',
    'uses' => 'UbicacionesController@destroy',
]);


Route::resource('api/imagenes', 'API\ImagenesAPIController');

Route::resource('imagenes', 'ImagenesController');

Route::get('imagenes/{id}/delete', [
    'as' => 'imagenes.delete',
    'uses' => 'ImagenesController@destroy',
]);
