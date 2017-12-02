<?php

use Illuminate\Http\Request;

// *** Auth Routes ***
Auth::routes();

// *** Dashboard Routes ***
Route::get('/dashboard', 'DashboardController@index')->name('Dashboard');

// *** Property Routes ***
Route::get('/', 'PropertiesController@index')->name('index');
Route::resource('properties', 'PropertiesController');
Route::get('/search', 'PropertiesController@search');

// CONFLICTING ROUTE!!!!
// Route::put('properties/{id}', 'PropertiesController@updateCoverPhoto')->name('properties.updateCoverPhoto');
// CONFLICTING ROUTE!!!!

// *** Photo Routes ***

// Manage
Route::get('/properties/{id}/managephotos', 'PhotosController@index')->name('photos.manage');
// Update Cover Photo
Route::put('properties/{id}/updatecoverphoto',
	'PropertiesController@updateCoverPhoto')->name('properties.updateCoverPhoto');
// Create
Route::get('/photos/{id}/create', 'PhotosController@create')->name('photos.create');
// Store
Route::post('photos', 'PhotosController@store')->name('photos.store');
// Show
Route::get('/photos/{id}', 'PhotosController@show')->name('photos.show');
// Edit
Route::get('/photos/{id}/edit', 'PhotosController@edit')->name('photos.edit');
// Update
Route::put('/photos/{id}', 'PhotosController@update')->name('photos.update');
// Destroy
Route::delete('/photos/{id}', 'PhotosController@destroy')->name('photos.destroy');

// *** Test Routes ***
Route::get('/test', 'TestController@index');