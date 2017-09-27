<?php

use Illuminate\Http\Request;
use App\User;
use App\Property;
// use Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware'=>'api'], function(){
	// Fetch user info
	Route::get('user', function(){
		return User::find( 1 );
	});

	// Fetch properties
	Route::get('properties', function(){
		return Property::all(); // SHOULD BE ONLY THIS USER'S PROPERTIES!!!
	});
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
