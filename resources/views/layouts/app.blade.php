<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title', env('APP_NAME'))</title>
	<meta name="csrf-token" content="{{csrf_token()}}">
	{{-- Bootstrap css --}}
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	{{-- Compiled App.css --}}
	<link rel="stylesheet" href="/css/app.css">
	@yield('stylesheets')
	{{-- Compiled App.js --}}
</head>
<body>
	@include('parts.navbar')
	<div class="container content">
		{{-- Messages --}}
		<div class="col-xs-12">
			<div class="col-md-6 col-md-offset-3">
				{{-- @include('parts.screensize') --}}
				@include('parts.messages')
				{{-- @include('parts.test') --}}
			</div>
		</div>
		{{-- Main Content --}}
		@yield('content')
	</div>
	@include('parts.footer')
	<script src="/js/app.js"></script>
	@yield('scripts')
</body>
</html>