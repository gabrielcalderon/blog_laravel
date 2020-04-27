@extends('layouts.app')

@section('body')

<body class="body">
	@include('macros._navbar')
	<main role="main" class="container mt-4">
		<div class="row">
			<div class="col-sm-8">@include('layouts.flash-message')</div>
			@yield('content-base')
		</div>
	</main>
	<footer class="sticky-footer bg-white">
		<div class="container my-auto">
			<div class="copyright text-center my-auto">
				<span>Copyright &copy; Your Website 2020</span>
			</div>
		</div>
	</footer>
</body>
@endsection