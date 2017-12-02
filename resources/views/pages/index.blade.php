@extends('layouts.app')

@section('title')
	Welcome
@endsection

@section('content')
	
	{{-- Temp styles --}}
	<style>
	</style>

	{{-- <h1 class="text-center">Welcome</h1> --}}

	<div class="col-md-6 col-md-offset-3">
		<div class="row">
			<form method="GET" action="/">
				<div class="form-group">
					<input type="search" class="form-control input-md" placeholder="Search" name="q" autofocus>
				</div>
				{{-- <button type="submit" class="btn btn-default btn-sm">Submit</button> --}}
			</form>
		</div>
	</div>

	<br>
	<br>

	<hr>

	{{-- @include --}}
	
	@if($properties->count())
		{{-- <h3>Recently Listed Properties</h3> --}}
		
		<br>
		<div class="row">
			{{-- Display properties if they exist --}}
			@foreach($properties as $property)
				<div class="col-lg-3 col-md-4 col-sm-6">
					<div class="thumbnail">
						<a href="/properties/{{$property->id}}">
							@if($property->cover_image == 'NULL' || is_null($property->cover_image))
								<div
									class="square"
									{{-- style="background-image: url('http://cdn.homedsgn.com/wp-content/uploads/2015/02/Capitol-Hill-Loft-03.jpg')" --}}
									style="background-image: url('/storage/photos/image-not-available.jpg')">
								</div>
								{{-- <img
									class="img-responsive"
									src="http://cdn.homedsgn.com/wp-content/uploads/2015/02/Capitol-Hill-Loft-03.jpg"
									alt="{{$property->title}}"> --}}
							@else
								{{-- <img
									class="img-responsive"
									src="/storage/photos/{{$property->id}}/{{$property->cover_image}}"
									alt="{{$property->title}}"> --}}
								<div
									class="square"
									style="background-image: url('/storage/photos/{{$property->id}}/{{$property->cover_image}}')">
								</div>
							@endif	
						</a>
						<div class="caption">
							<h3 class="indexTitle">{{$property->title}}</h3>
							<p class="text-success"><strong>${{$property->price}}</strong></p>

							{{-- Make thumbnails same height --}}
							{{-- <p class="indexDescription">
								@if(strlen($property->description)>105)
									{{substr($property->description, 0, 105)}}...
								@else
									{{$property->description}}
								@endif
							</p> --}}
							
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
		<h3>No properties found</h3>
	@endif

@endsection