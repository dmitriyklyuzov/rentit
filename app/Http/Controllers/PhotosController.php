<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
    public function index($property_id){
        $photos = Photo::where('property_id', $property_id)->get();
        return view('photos.index')->with('photos', $photos);
    }

    public function create($property_id){
        return view('photos.create')->with('property_id', $property_id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'photo'=>'image|max:1999'
        ]);

        if($request->input('description')=='' || empty($request->input('description')) || is_null($request->input('description')) ){
            $photo->description = "";
        }
        else
            $photo->description = $request->input('description');

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
        $photo->property_id = $request->input('property_id');
        $photo->title = $request->input('title');
        // $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $filenameToStore;
        if($request->input('description')=='' || empty($request->input('description')) || is_null($request->input('description')) ){
            $photo->description = "";
        }
        else{
            $photo->description = $request->input('description');
        }

        $photo->save();

        return redirect('/properties/'.$request->input('property_id'))->with('success', 'Photo Uploaded');
    }

    public function show($id)
    {
        $photo = Photo::find($id);
        return view('photos.show')->with('photo', $photo);
    }

    public function edit($id)
    {
        $photo = Photo::find($id);
        return view('photos.edit')->with('photo', $photo);
    }

    public function update(Request $request, $id)
    {
        // Upload photo
        $photo = Photo::findOrFail($id);
        $photo->title = $request->input('title');
        if($request->input('description')=='' || empty($request->input('description')) || is_null($request->input('description')) ){
            $photo->description = "";
        }
        else{
            $photo->description = $request->input('description');
        }

        $photo->save();
        return view('photos.show')->with('photo', $photo);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);

        if(Storage::delete('public/photos/'.$photo->property_id.'/'.$photo->photo)){
            $photo->delete();
            return redirect('/')->with('success', 'Photo Deleted');
        }
    }
}
