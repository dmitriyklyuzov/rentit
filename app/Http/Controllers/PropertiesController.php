<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertiesController extends Controller
{
	public function __construct()
	{
		// Allow guests to access only show and index methods
		$this->middleware('auth', ['except'=>['show', 'index']]);
	}

	public function index(Request $request)
	{
		// capture query if any
		$query = $request->get('q');
		// check if query is not empty
		if($query){
			$properties = Property::where('title', 'LIKE', "%$query%")->get();
		}
		// Otherwise, get all available properties
		else{
			$properties = Property::orderBy('created_at', 'desc')->where('available', '1')->get();
		}
		return view('pages.index')->with(['properties' => $properties]);
		// return view('bootstrap4.pages.index')->with(['properties' => $properties]);
	}

	public function create()
	{
		
		return view('properties.create');
	}

	public function store(Request $request)
	{
		// Validate input
		$this->validate($request, [
			'title' => 'required',
			'bedrooms' => 'required',
			'bathrooms' => 'required',
			'price' => 'required',
			'description' => 'required',
			'street' => 'required',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required'
		]);

		// Set property properties to form values
		$property = new Property();
		$property->title = $request->input('title');
		$property->bedrooms = $request->input('bedrooms');
		$property->bathrooms = $request->input('bathrooms');
		$property->available = $request->input('available');
		$property->utilities_included = $request->input('utilities_included');
		$property->price = $request->input('price');
		$property->description = $request->input('description');
		$property->street = $request->input('street');
		$property->apartment = $request->input('apartment');
		$property->city = $request->input('city');
		$property->state = $request->input('state');
		$property->zip = $request->input('zip');
		$property->user_id = auth()->user()->id;

		// Temporary
		$property->type = 'Residential';
		$property->cover_image = 'NULL';
		
		// If 'Apartment' was left blank, set it to ''
		if($property->apartment == '' || is_null($property->apartment) || empty($property->apartment)){
			$property->apartment = '';
		}
		
		// Save the property
		$property->save();

		// return redirect('/');
		return view('properties.show')->with(['property' => $property, 'success' => 'Property Added']);   
		return $property;
	}

	public function show($id)
	{
		$property = Property::with('Photos')->findOrFail($id);
		// return view('properties.show')->with(['property' => $property]);
		return view('properties.show')->with(['property' => $property]);
	}

	public function edit($id)
	{
		$property = Property::findOrFail($id);
		// return $property->cover_image;
		return view('properties.edit')->with(['property' => $property]);
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'title' => 'required',
			'bedrooms' => 'required',
			'bathrooms' => 'required',
			'price' => 'required',
			'description' => 'required',
			'street' => 'required',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required'
		]);

		// Lookup property
		$property = Property::findOrFail($id);

		// Update property
		$property->title 		= $request->input('title');
		$property->bedrooms 	= $request->input('bedrooms');
		$property->bathrooms 	= $request->input('bathrooms');
		$property->available 	= $request->input('available');
		$property->utilities_included = $request->input('utilities_included');
		$property->price 		= $request->input('price');
		$property->description 	= $request->input('description');
		$property->street 		= $request->input('street');
		$property->apartment 	= $request->input('apartment');
		$property->city 		= $request->input('city');
		$property->state 		= $request->input('state');
		$property->cover_image 	= $request->input('cover_image');
		$property->zip 			= $request->input('zip');
		$property->user_id = auth()->user()->id;	

		$property->type = 'Residential';
		// $property->cover_image = 'http://www.borderless-house.com/icon/ic-house-brown.svg';

		// If apt is empty, set it to ''
		if($property->apartment == '' || is_null($property->apartment) || empty($property->apartment)){
			$property->apartment = '';
		}
		
		// save the updated property
		$property->save();
		
		// return show view with a success message
		return view('properties.show')->with(['property' => $property, 'success' => 'Property Updated']);
	}

	public function updateCoverPhoto(Request $request, $id){
		// Lookup property
		$property = Property::findOrFail($id);

		// Set the cover image url to the value of the hidden input field
		$property->cover_image = $request->input('photo');

		// Save the property
		$property->save();

		// Redirect to the property page with a success message
		return redirect(route('properties.show', ['id'=>$id]))->with('success', 'Cover Photo Updated');
	}

	public function destroy($id)
	{
		$property = Property::findOrFail($id);
		$property->delete();
		return redirect('/dashboard')->with('success', 'Property Deleted');
	}
}
