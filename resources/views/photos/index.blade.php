@extends('layouts.app')

@section('title')
	Manage Photos
@endsection

@section('content')

	<style>
		.thumbnail{
			margin-bottom: 10px;
		}

		.square{
			width: 100%;
			padding-bottom: 100%;
			background-size: cover;
			background-position: center;
		}
	</style>

	<a href="/properties/{{$property->id}}" class="btn btn-success"><i class="fa fa-arrow-left"></i>&nbsp; Go back</a>
	
	<a href="/photos/{{$property_id}}/create" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; Add New</a>	
	
	<hr>
	
	<div class="col-xs-12">

		@foreach($photos as $photo)

		<div class="col-md-3">

			{{-- Image --}}
			<a class="thumbnail" href="{{route('photos.edit', ['id'=>$photo->id])}}">
				<div
					class="square"
					style="background-image: url('/storage/photos/{{$photo->property_id}}/{{$photo->photo}}')">
				</div>
			</a>
			
			{{-- Controls --}}
			<div class="text-center" style="padding-left: 10px; padding-bottom: 10px">
				{{-- Edit button --}}
				{{-- <a href="{{ route('photos.edit', ['id'=>$photo->id]) }}" class="btn btn-success btn-sm">Edit</a> --}}

				{{-- Make main button --}}
				<form action="{{ route('properties.updateCoverPhoto', ['id'=>$photo->property_id]) }}" method="post" class="display-inline">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="photo" value="{{$photo->photo}}">
					<input type="submit" value="Make main" class="btn btn-warning btn-sm">
				</form>

				{{-- Delete Button --}}
				<form action="{{ route('photos.destroy', ['id'=>$photo->id]) }}"
					method="post"
					class="display-inline"
					onsubmit="return confirm('Delete this photo?');">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="DELETE">
					<input type="submit" value="Delete" class="btn btn-danger btn-sm">
				</form>	
			</div>
		</div>

		@endforeach
	</div>
@endsection