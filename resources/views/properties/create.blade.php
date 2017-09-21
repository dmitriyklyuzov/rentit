@extends('layouts.app')

@section('title')
	Add Property
@endsection

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
						{{ Form::bootDrop('Available', 'available', '1') }}
						{{ Form::bootDrop('Utilities included', 'utilities_included', '1') }}
						{{ Form::bootCurrency('Price', 'price', '', ['placeholder'=>'1500']) }}
						{{ Form::bootTextArea('Description', 'description', '', ['placeholder'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore excepturi omnis earum, deleniti quisquam. Provident facere quidem, quos culpa et, asperiores aliquid, laborum odio quibusdam, voluptas id officiis sint quaerat!']) }}

						{{-- Address --}}
	                	<br><p class="text-center"><b>Address</b></p><br>
	                	{{ Form::bootText('Street', 'street', '', ['placeholder'=>'1405 71st St']) }}
	                	{{ Form::bootText('Apartment/Suite', 'apartment', '', ['placeholder'=>'Apt B3 / Ste 1F']) }}
	                	{{ Form::bootText('City', 'city', '', ['placeholder'=>'Brooklyn']) }}
	                	{{ Form::bootText('State', 'state', '', ['placeholder'=>'NY'])}}
	                	{{ Form::bootText('ZIP Code', 'zip', '', ['placeholder'=>'11228']) }}

	                	<br>

						{{-- Submit --}}
						{{ Form::bootSubmit('Submit', ['class' => 'btn btn-primary pull-right'])}}	

	                {!! Form::close() !!}
			    </div>
            </div>
        </div>
    </div>
@endsection