<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title', env('APP_NAME'))</title>
	<meta name="csrf-token" content="{{csrf_token()}}">
	{{-- Compiled App.css --}}
	<link rel="stylesheet" href="/css/app.css">
	@yield('stylesheets')
	{{-- Compiled App.js --}}
</head>
<body>
	@include('parts.navbar')
	<div class="container content">
		{{-- Messages --}}
		<div class="col-md-6 col-md-offset-3">
			@include('parts.messages')
		</div>
		{{-- Main Content --}}
		@yield('content')
	</div>
	@include('parts.footer')
	<script src="/js/app.js"></script>
	@yield('scripts')
</body>
</html>