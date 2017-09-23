@extends('layouts.app')

@section('title')
	Welcome
@endsection

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
						<a href="/properties/{{$property->id}}">
								<img
									class="img-responsive"
									src="http://cdn.homedsgn.com/wp-content/uploads/2015/02/Capitol-Hill-Loft-03.jpg"
									alt="{{$property->title}}">
						</a>
						<div class="caption">
							<h3>{{$property->title}}</h3>
							<p><strong>${{$property->price}}</strong></p>

							{{-- Make thumbnails same height --}}
							<p class="indexDescription">
								@if(strlen($property->description)>105)
									{{substr($property->description, 0, 105)}}...
								@else
									{{$property->description}}
								@endif
							</p>
							
							<p>
								<a href="/properties/{{$property->id}}" class="btn btn-primary" role="button">More Info</a>
							</p>
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