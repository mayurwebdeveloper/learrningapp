<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/config', 'App\Http\Controllers\ConfigController@index')->name('config');
Route::put('/config/update/{id}', 'App\Http\Controllers\ConfigController@update')->name('config.update');


Route::get('/category','App\Http\Controllers\CategoryController@index')->name('categories.index');
Route::get('/category/create','App\Http\Controllers\CategoryController@create')->name('category.create');
Route::post('/category/store','App\Http\Controllers\CategoryController@store')->name('category.store');
Route::get('/category/edit/{id}','App\Http\Controllers\CategoryController@edit')->name('category.edit');
Route::put('/category/update/{id}', 'App\Http\Controllers\CategoryController@update')->name('category.update');
Route::get('/category/destroy/{id}', 'App\Http\Controllers\CategoryController@destroy')->name('category.destroy');


Route::get('/image','App\Http\Controllers\ImageController@index')->name('image.index');
Route::get('/image/create','App\Http\Controllers\ImageController@create')->name('image.create');
Route::post('/image/store','App\Http\Controllers\ImageController@store')->name('image.store');
Route::get('/image/edit/{id}','App\Http\Controllers\ImageController@edit')->name('image.edit');
Route::put('/image/update/{id}', 'App\Http\Controllers\ImageController@update')->name('image.update');
Route::get('/image/destroy/{id}', 'App\Http\Controllers\ImageController@destroy')->name('image.destroy');
Route::get('/image/bulkupdate/', 'App\Http\Controllers\ImageController@bulkupdate')->name('image.bulkupdate');
Route::post('/image/removeimage','App\Http\Controllers\ImageController@removeimage')->name('image.removeimage');

Route::group(['namespace' => 'App\Http\Controllers\Profile'], function (){ 
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::put('/profile/update/profile/{id}', 'ProfileController@updateProfile')->name('profile.update.profile');
	Route::put('/profile/update/password/{id}', 'ProfileController@updatePassword')->name('profile.update.password');
	Route::put('/profile/update/avatar/{id}', 'ProfileController@updateAvatar')->name('profile.update.avatar');
});

Route::group(['namespace' => 'App\Http\Controllers\Error'], function (){ 
	Route::get('/unauthorized', 'ErrorController@unauthorized')->name('unauthorized');
});

Route::group(['namespace' => 'App\Http\Controllers\User'], function (){ 
	//Users
	Route::get('/user', 'UserController@index')->name('user');
	Route::get('/user/create', 'UserController@create')->name('user.create');
	Route::post('/user/store', 'UserController@store')->name('user.store');
	Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
	Route::put('/user/update/{id}', 'UserController@update')->name('user.update');
	Route::get('/user/edit/password/{id}', 'UserController@editPassword')->name('user.edit.password');
	Route::put('/user/update/password/{id}', 'UserController@updatePassword')->name('user.update.password');
	Route::get('/user/show/{id}', 'UserController@show')->name('user.show');
	Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
	// Roles
	Route::get('/role', 'RoleController@index')->name('role');
	Route::get('/role/create', 'RoleController@create')->name('role.create');
	Route::post('/role/store', 'RoleController@store')->name('role.store');
	Route::get('/role/edit/{id}', 'RoleController@edit')->name('role.edit');
	Route::put('/role/update/{id}', 'RoleController@update')->name('role.update');
	Route::get('/role/show/{id}', 'RoleController@show')->name('role.show');
	Route::get('/role/destroy/{id}', 'RoleController@destroy')->name('role.destroy');

	
});