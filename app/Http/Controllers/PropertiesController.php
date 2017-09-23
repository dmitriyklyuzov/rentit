<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertiesController extends Controller
{
    public function index()
    {
        $properties = Property::orderBy('created_at', 'desc')->get();
        return view('pages.index')->with(['properties' => $properties]);
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        // // Validate input
        // $this->validate($request, [
        //     'title'=>'required'
        // ]);

        // Create property
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

        $property->type = 'Residential';
        // $property->rented = '0000-00-00 00:00:00';
        $property->cover_image = 'NULL';

        $property->save();

        return redirect('/');
        return view('properties.show')->with(['property' => $property, 'success' => 'Property Added']);        
        return $property;
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.show')->with(['property' => $property]);
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.edit')->with(['property' => $property]);
    }

    public function update(Request $request, $id)
    {
        // // Validate input
        // $this->validate($request, [
        //     'title'=>'required'
        // ]);

        // Lookup property
        $property = Property::findOrFail($id);

        // Update property
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

        $property->type = 'Residential';
        // $property->rented = '0000-00-00 00:00:00';
        $property->cover_image = 'NULL';

        $property->save();

        return redirect(route('properties.show', ['id'=>$id]));
        return view('properties.show')->with(['property' => $property, 'success' => 'Property Updated']);
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();
        return redirect('/dashboard')->with('success', 'Property Deleted');
    }
}
