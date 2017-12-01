<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Property;
use App\Photo;

class PhotosController extends Controller
{
    public function index($property_id){
        $photos = Photo::where('property_id', $property_id)->get();
        $property = Property::find($property_id);
        return view('photos.index')->with(['photos' => $photos, 'property_id' => $property_id, 'property' => $property]);
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

        $property = Property::findOrFail($photo->property_id);

        // check if cover photo exists already - if not, set this image to cover
        if($property->cover_image=='NULL' || is_null($property->cover_image)){
            $property->cover_image=$photo->photo;
            $property->save();
        }

        return redirect("/properties/".$photo->property_id."/managephotos")->with('success', 'Photo Uploaded');
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
        // If no description provided, use ""
        if($request->input('description')=='' || empty($request->input('description')) || is_null($request->input('description')) ){
            $photo->description = "";
        }
        // Else save get photo description
        else{
            $photo->description = $request->input('description');
        }

        // Save photo
        $photo->save();

        // Redirect to photo dashboard
        return redirect("/properties/$id/managephotos")->with('success', 'Photo Updated');
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);

        $property = Property::findOrFail($photo->property_id);

        if($property->cover_image == $photo->photo){
            $property->cover_image = NULL;
            $property->save();
        }

        if(Storage::delete('public/photos/'.$photo->property_id.'/'.$photo->photo)){
            $photo->delete();
            return redirect('/properties/'.$photo->property_id.'/managephotos')->with('success', 'Photo Deleted');
        }
    }
}
