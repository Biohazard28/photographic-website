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
Route::get('index','UserController@index');
Route::get('home','UserController@home');


Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'login']
);
Route::post('login', 'Auth\AuthController@postLogin');


// Registration routes...
Route::get('register', [
    'uses' => 'Auth\AuthController@getRegister',
     'as'  => 'register']
);

Route::get('profile',[
    'uses' =>'ProfileController@index',
    'as'   =>'profile'
]);
Route::post('register', 'Auth\AuthController@postRegister');

Route::get('/', [
    'uses'=>'Auth\AuthController@getLogout',
    'as'  =>'logout'
]);
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('album/list','AlbumController@viewAlbumList');
Route::post('album/save','AlbumController@saveAlbum');
Route::get('album/view/{id}','AlbumController@viewAlbumPics');
Route::post('upload','AlbumController@uploadPhotos');
Route::post('add-category','AlbumController@addCategory');

Route::get('new-album','AlbumController@newAlbum');
Route::get('new-category','AlbumController@newCategory');
Route::get('album/{id}/add-photos','AlbumController@addPhotos');
Route::get('album/photo','AlbumController@showAlbumPhotos');