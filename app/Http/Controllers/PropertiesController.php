<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        return view('pages.index')->with(['properties' => $properties, 'title' => 'Welcome']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties.create')->with('title', 'Add Property');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        // return $request->input('available');
        return view('properties.show')->with(['property' => $property, 'title' => 'test']);        
        return $property;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.show')->with(['property' => $property, 'title' => $property->title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
