<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth Routes
Auth::routes();

// Dashboard Routes
Route::get('/dashboard', 'DashboardController@index')->name('Dashboard');

// Property Routes
Route::get('/', 'PropertiesController@index');
Route::resource('properties', 'PropertiesController');

// Photo Routes
// Manage
Route::get('/properties/{id}/managephotos', 'PhotosController@index')->name('photos.manage');
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