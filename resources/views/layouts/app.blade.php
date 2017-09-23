<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title', env('APP_NAME'))</title>
	<meta name="csrf-token" content="{{csrf_token()}}">
	{{-- Compiled App.css --}}
	<link rel="stylesheet" href="/css/app.css">
	{{-- Compiled App.js --}}
	<script src="/js/app.js"></script>
</head>
<body>
	@include('parts.navbar')
	<div class="container content">
		{{-- Messages --}}
		@include('parts.messages')
		{{-- Main Content --}}
		@yield('content')
	</div>
	@include('parts.footer')
</body>
</html>