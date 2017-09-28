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


Auth::routes();

Route::get('/', 'PropertiesController@index');

//Edit photos route - handled by the 'edit photos' function of the properties controller 
Route::get('/properties/{id}/editphotos', 'PropertiesController@editPhotos');

Route::get('/dashboard', 'DashboardController@index')->name('Dashboard');

Route::resource('properties', 'PropertiesController');

