@extends('layouts.app')

@section('title')
	Upload photos
@endsection

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<h3>Upload Photo</h3>
		<br>
		{!! Form::open(['action'=>'PhotosController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
	    	{{ Form::bootText('Photo title', 'title', '', ['placeholder'=>'Photo Title']) }}
	    	{{ Form::bootTextArea('Photo description', 'description', '', ['placeholder'=>'Photo Description']) }}
	    	{{ Form::hidden('property_id', $property_id) }}
	    	{{ Form::file('photo') }}
	    	{{ Form::bootSubmit('Submit', ['class' => 'btn btn-primary pull-right'])}}	
		{!! Form::close() !!}
	</div>
@endsection