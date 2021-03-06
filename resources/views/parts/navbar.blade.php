<nav class="navbar navbar-inverse" id="main-navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">{{env('APP_NAME')}}</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			
			<ul class="nav navbar-nav">
				{{-- <li><a href="#">Home</a></li> --}}
				{{-- <li><a href="#about">About</a></li> --}}
				{{-- <li><a href="#contact">Contact</a></li> --}}
			</ul>

			@if(Route::current()->getName()!='index')
				{{-- Navbar search --}}
				<form class="navbar-form navbar-left" method="GET" action="/">
					<div class="form-group">
						<input type="search" class="form-control input-md" placeholder="Search" name="q">
					</div>
					{{-- <button type="submit" class="btn btn-default btn-sm">Submit</button> --}}
				</form>
			@endif

	        <!-- Right Side Of Navbar -->
	        <ul class="nav navbar-nav navbar-right">
	            <!-- Authentication Links -->
	            @if (Auth::guest())
	                <li><a href="{{ route('login') }}">Login</a></li>
	                <li><a href="{{ route('register') }}">Register</a></li>
	            @else
	                <li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                        {{ Auth::user()->name }} <span class="caret"></span>
	                    </a>

	                    <ul class="dropdown-menu" role="menu">
	                        <li>
	                            <a href="{{ route('logout') }}"
	                                onclick="event.preventDefault();
	                                         document.getElementById('logout-form').submit();">
	                                Logout
	                            </a>

	                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                                {{ csrf_field() }}
	                            </form>
	                        </li>

	                        <li>
	                            <a href="{{ url('dashboard') }}">Dashboard</a>
	                        </li>
	                        <li>
	                        	<a href="{{ route('properties.create') }}">Add Listing</a>
	                        </li>
	                    </ul>
	                </li>
	            @endif
	        </ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>