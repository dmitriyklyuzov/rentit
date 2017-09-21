@extends('layouts.app')

@section('title')
	{{$property->title}}
@endsection

@section('content')
	<div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Listing</div>

                <div class="panel-body">
	                {!! Form::open(['action' => ['PropertiesController@update', $property->id], 'method' => 'POST']) !!}
	                	{{ Form::bootText('Title', 'title', $property->title) }}
	                	
						{{-- Details --}}
						<br><p class="text-center"><b>Details</b></p><br>
						{{ Form::bootText('Number of bedrooms', 'bedrooms', $property->bedrooms) }}
						{{ Form::bootText('Number of bathrooms', 'bathrooms', $property->bathrooms) }}
						{{ Form::bootDrop('Available', 'available', $property->available) }}
						{{ Form::bootDrop('Utilities included', 'utilities_included', $property->utilities_included) }}
						{{ Form::bootCurrency('Price', 'price', $property->price) }}
						{{ Form::bootTextArea('Description', 'description', $property->description) }}

						{{-- Address --}}
	                	<br><p class="text-center"><b>Address</b></p><br>
	                	{{ Form::bootText('Street', 'street', $property->street) }}
	                	{{ Form::bootText('Apartment/Suite', 'apartment', $property->apartment) }}
	                	{{ Form::bootText('City', 'city', $property->city) }}
	                	{{ Form::bootText('State', 'state', $property->state) }}
	                	{{ Form::bootText('ZIP Code', 'zip', $property->zip) }}

	                	{{ Form::hidden('_method', 'PUT')}}

	                	<br>

						{{-- Submit --}}
						{{ Form::bootSubmit('Update', ['class' => 'btn btn-primary pull-right'])}}	

	                {!! Form::close() !!}
			    </div>
            </div>
        </div>
    </div>
@endsection