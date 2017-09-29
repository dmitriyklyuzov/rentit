@if(count($property->photos)>0)
	<div id="photosCarousel" class="carousel slide" @if(count($property->photos)>1){{'data-ride="carousel"'}}@endif>

		@if(count($property->photos)>1)
		<!-- Indicators -->
		<ol class="carousel-indicators">
			@for($i=0; $i<count($property->photos); $i++)
			<li data-target="#photosCarousel" data-slide-to="$i" class="@if($i==0){{'active'}}@endif"></li>
			@endfor
		</ol>
		@endif

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			@for($i=0; $i<count($property->photos); $i++)
			@php
				$photo = $property->photos[$i];
			@endphp
			<div class="item @if($i==0){{'active'}}@endif">
				<img src="/storage/photos/{{$photo->property_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
				<div class="carousel-caption">
					<p>{{$photo->description}}</p>
				</div>
			</div>
			@endfor
		</div>

		@if(count($property->photos)>1)
		<!-- Left and right controls -->
		<a class="left carousel-control" href="#photosCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#photosCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
		@endif

	</div>
@else
	<img
		class="img-responsive"
		src="http://via.placeholder.com/800x600?text=No+images+added+yet."
		{{-- src="http://cdn.homedsgn.com/wp-content/uploads/2015/02/Capitol-Hill-Loft-03.jpg" --}}
		alt="{{$property->title}}">
@endif
