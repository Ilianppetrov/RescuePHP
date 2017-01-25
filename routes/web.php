<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 
	[ 'uses' => 'HomeController@index',
	'as' => 'home' ]);

Route::get('/animal-add', [
	'uses' => 'AnimalController@getAddAnimal',
	'as' => 'add.animal',
	'middleware' => 'role',
	'roles' => 'user'
	]);

Route::post('/animal-add', [
	'uses' => 'AnimalController@postAddAnimal',
	'as' => 'add.animal',
	'middleware' => 'role',
	'roles' => 'user'
	]);

Route::get('/animal-profile/{id}', [
	'uses' => 'AnimalController@animalProfile',
	'as' => 'animal.profile'
	]);

Route::get('/user/animals', [
	'uses' => 'UserController@getAnimals',
	'as' => 'user.animals',
	'middleware' => 'role',
	'roles' => 'user'
	]);

Route::get('/animal-edit/{id}', [
	'uses' => 'AnimalController@getEditAnimal',
	'as' => 'animal.edit',
	'middleware' => 'role',
	'roles' => 'user'
	]);

Route::post('/animal-edit/{id}', [
	'uses' => 'AnimalController@postEditAnimal',
	'as' => 'animal.edita',
	'middleware' => 'role',
	'roles' => 'user'
	]);

Route::get('/animal-delete/{id}', [
	'uses' => 'AnimalController@postDeleteAnimal',
	'as' => 'animal.delete',
	'middleware' => 'role',
	'roles' => 'user'
	]);

Route::post('/images-upload/{id}',[
	'uses' => 'ImageController@postUploadImages',
	'as' => 'upload.images',
	'middleware' => 'role',
	'roles' => 'user'
	]);

Route::post('/image-delete/{id}', [
	'uses' => 'ImageController@deleteImage',
	'as' => 'delete.image',
	'middleware' => 'role',
	'roles' => 'user'
	]);

Route::post('/image-default/{id}', [
	'uses' => 'ImageController@defaultImage',
	'as' => 'default.image',
	'middleware' => 'role',
	'roles' => 'user'
	]);



Auth::routes();






Route::get('/admin-home', [
	'uses' => 'AdminController@index',
	'as' => 'admin.home',
	'middleware' => 'role',
	'roles' => 'admin'
	]);


