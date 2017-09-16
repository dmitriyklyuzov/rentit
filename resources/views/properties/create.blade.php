@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Add Listing</div>

                <div class="panel-body">
	                {!! Form::open(['action' => 'PropertiesController@store', 'method' => 'POST']) !!}
	                	{{ Form::bootText('Title', 'title', '', ['placeholder'=>'Beautiful 1Bd in Bensonhurst']) }}
	                	
						{{-- Details --}}
						<br><p class="text-center"><b>Details</b></p><br>
						{{ Form::bootText('Number of bedrooms', 'bedrooms', '', ['placeholder'=>'3']) }}
						{{ Form::bootText('Number of bathrooms', 'bathrooms', '', ['placeholder'=>'1.5']) }}
						{{ Form::bootDrop('Available', 'availability') }}

						{{-- Address --}}
	                	<br><p class="text-center"><b>Address</b></p><br>
	                	{{ Form::bootText('Street', 'street', '', ['placeholder'=>'1405 71st St']) }}
	                	{{ Form::bootText('Apartment/Suite', 'apt', '', ['placeholder'=>'B3'])}}
	                	{{ Form::bootText('City', 'city', '', ['placeholder'=>'Brooklyn']) }}
	                	{{ Form::bootText('State', 'state', '', ['placeholder'=>'NY'])}}
	                	{{ Form::bootText('ZIP Code', 'zip', '', ['placeholder'=>'11228']) }}


	                {!! Form::close() !!}
			    </div>
            </div>
        </div>
    </div>
@endsection