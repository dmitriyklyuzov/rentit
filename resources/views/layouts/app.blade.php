<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{env('APP_NAME')}}</title>
	{{-- Compiled App.css --}}
	<link rel="stylesheet" href="/css/app.css">
	{{-- Compiled App.js --}}
	<script src="/js/app.js"></script>
</head>
<body>
	{{-- Default Navbar --}}
	@include('parts.navbar')
	<div class="container">
		{{-- Main Content --}}
		@yield('content')
	</div>
</body>
</html>