@extends('layouts.app')

@section('content')

	<hr><br>
	
	{{-- Left column --}}
	<div class="col-md-8 col-sm-7">
		
		{{-- Property image --}}
		<img
			class="img-responsive"
			src="http://cdn.homedsgn.com/wp-content/uploads/2015/02/Capitol-Hill-Loft-03.jpg"
			alt="{{$property->title}}">

		{{-- Google Maps Embed --}}
		<div class="embed-responsive embed-responsive-4by3">
			<iframe
				class="embed-responsive-item"
				id="googleMapsEmbed"
				src="//www.google.com/maps/embed/v1/place?q={{$property->getGoogleMapsAddress()}}
				&zoom=17
				&key={{env('MAPS_API_KEY')}}">
			</iframe>
		</div>		
	</div>
		
		{{-- Right column --}}
		<div class="col-md-4 col-sm-5">
			<h1>{{$property->title}} <small>${{$property->price}}</small></h1>
			<br><hr>

			{{-- Info icons --}}
			<div class="row">
				{{-- Bedrooms --}}
				<div class="col-xs-4 text-center">
					<p><i class="fa fa-bed fa-lg" aria-hidden="true"></i></p>
					<small>{{$property->bedrooms}} bedroom</small>
				</div>
				{{-- Bathrooms --}}
				<div class="col-xs-4 text-center">
					<p><i class="fa fa-bathtub fa-lg" aria-hidden="true"></i></p>
					<small>{{$property->bathrooms}} bathroom</small>
				</div>
				{{-- Availability --}}
				<div class="col-xs-4 text-center">
					<p><i class="fa @if($property->available==1) fa-check @else fa-remove @endif fa-lg" aria-hidden="true"></i></p>
					<small>@if($property->available==1) Available @else Unavailable @endif</small>
				</div>
			</div>
			
			<hr><br>
			
			{{-- Description text --}}
			<p>{{$property->description}}</p>
			
			<br><hr>
			
			{{-- Details and price--}}
			<div class="row">
				{{-- Details --}}
				<div class="col-xs-6">
					<p><b>Details</b></p>
					<br>
					<p>Bedrooms: <b>{{$property->bedrooms}}</b></p>
					<p>Bathrooms: <b>{{$property->bathrooms}}</b></p>
					<p>Utilities included: <b>@if($property->utilities_included==1) Yes @else No @endif</b></p>	
				</div>
				{{-- Prices and Fees --}}
				<div class="col-xs-6">
					<p><b>Price and fees</b></p>
					<br>
					<p>Monthly: <b>${{$property->price}}</b></p>
					<p>Broker fee: <b>${{$property->price}}</b></p>
					<p>Security deposit: <b>${{$property->price}}</b></p>
				</div>
			</div>
			
			<br><hr>

			{{-- Full address --}}
			<p><b>Address</b></p>
			<br>
			<p>{{$property->getFullAddress()}}</p>

			<hr><br>

			{{-- Contact --}}
			<div class="row">
				{{-- Contact info --}}
				<div class="col-xs-6">
					<p><b>Contact</b></p>
					<br>
					<p>{{$property->user->name}}</p>
		            <p><a href="mailto:{{$property->user->email}}">{{$property->user->email}}</a></p>
		            <p><a href="tel:{{$property->user->phone}}">{{$property->user->getPhone()}}</a></p>
				</div>

				{{-- Contact image --}}
				<div class="col-xs-5">
					<br>
					<img
						src="https://blog.linkedin.com/content/dam/blog/en-us/corporate/blog/2014/07/Anais_Saint-Jude_L4388_SQ.jpg.jpeg"
						alt="Contact image"
						class="img-responsive img-circle">
				</div>
			</div>
		</div>
			
@endsection