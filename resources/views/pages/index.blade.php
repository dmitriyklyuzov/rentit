@extends('layouts.app')

@section('content')
	<h1 class="text-center">Welcome</h1>
	
	@if(count($properties)>0)
		<h3>Recently Listed Properties</h3>
		<br>
		<div class="row">
			{{-- Display properties if they exist --}}
			@foreach($properties as $property)
				<div class="col-md-sm col-md-4">
					<div class="thumbnail">
						<img src="http://cdn.homedsgn.com/wp-content/uploads/2015/02/Capitol-Hill-Loft-03.jpg" alt="{{$property->title}}">
						<div class="caption">
							<h3>{{$property->title}}</h3>
							<p><strong>${{$property->price}}</strong></p>
							{{-- If description is longer than 105 characters, display the first 105 + '...' --}}
							@if(strlen($property->description)>105)
								<p>{{substr($property->description, 0, 105)}}...</p>
							{{-- Otherwise show full description + two line breaks to make thumbnails same height --}}
							@else
								<p>{{$property->description}}</p>
								<br>
								<br>
							@endif
							<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	{{-- Otherwise, say 'No properties' --}}
	@else
		<h3>No Recent Properties Listed</h3>
	@endif

@endsection