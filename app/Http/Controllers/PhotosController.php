<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'photo'=>'image|max:1999'
        ]);

        // Get filename with extension
        $filenameWithExt = $request->file('photo')->getClientOriginalName();

        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Get extension without comma
        $extension = $request->file('photo')->getClientOriginalExtension();

        // Create new filename
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        // Upload image
        $path = $request->file('photo')->storeAs('public/photos/'.$request->input('property_id'), $filenameToStore);

        // Upload photo
        $photo = new Photo;
        $photo->property_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $filenameToStore;
        $photo->save();

        return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
