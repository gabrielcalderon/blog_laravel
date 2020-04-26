<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
		<link href="{{ asset('icon/laravel.ico') }}" rel="shortcut icon" type="image/ico">

    <title>Application | @yield('title','Home') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/popper.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/account.css') }}" rel="stylesheet">
		<link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="bg-body">
<div id="app">
<nav class="navbar navbar-expand-md navbar-light bg-navbar shadow-sm sticky-top">
	<div class="container">
		<a class="navbar-brand" href="{{ url('/') }}">
				{{ config('app.name', 'Laravel') }}
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
				<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
				@auth
				<li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}">Mi Home <span class="sr-only">(current)</span></a>
        </li>
				@endauth
        <li class="nav-item">
          <a class="nav-link" href="#">API</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Más Información
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Sobre Nosotros..</a>
            <a class="dropdown-item" href="#">Contáctanos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
			</ul>

				<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
					<!-- Authentication Links -->
				@guest
						<li class="nav-item">
								<a class="nav-link fg-navbar-color" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						@if (Route::has('register'))
								<li class="nav-item fg-navbar-color">
										<a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>
						@endif
				@else
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							@if(Auth::user()->profile->image->ruta)
								<img class="img-current_user" src="{{ asset('images/accounts/'.Auth::user()->profile->image->ruta) }}" alt="">
							@endif						
              {{ Auth::user()->name }} <span class="caret"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							@if (Auth::user()->is_admin())
								<a class="dropdown-item" href="{{ route('admin.users.index') }}">
									Ir al Dashboard
								</a>
							@endif
							<a class="dropdown-item" href="{{ route('account.show',Auth::user()->profile) }}">
								Mi Perfil
							</a>

							<a class="dropdown-item text-light  bg-danger " href="{{ route('logout') }}"
									onclick="event.preventDefault();document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
							</form>
						</div>
					</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>

	<main role="main" class="container pt-4">
		<div class="row">
			<div class="col-md-8">
				@include('layouts.flash-message')
				@yield('content')
			</div>
			<div class="col-md-4">
			@section('sidebar')
				<div class="list-group toggle">
					<button type="button" class="list-group-item list-group-item-action active">
						Cras justo odio
					</button>
					<button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
					<button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
					<button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
					<button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>
				</div>
			@show
			</div>

		</div>
	</main>
</div>
</body>
</html>
