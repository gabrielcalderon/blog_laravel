@extends('layouts.base')

@section('title','Mi Perfil')

@section('content-base')
<div class="col-md-8">
	<div class="card" style="width: 20rem;">
		@if ($profile->image->ruta !== "default.jpg")
		<img class="card-img-top" src="{{ asset('images/accounts/'.$profile->image->ruta)}}">
		@endif
		<div class="card-body">
			<h5 class="card-title text-info">{{ Auth::user()->name }}</h5>
			<p class="card-text small">{{ $profile->historial }}</p>
		</div>
		@auth
		@if (auth()->user()->id === $profile->user_id)
		<div class="btn-group-sm m-3">
			<a href="{{ route('account.edit', $profile) }}" class="btn small text-gray-800 border-bottom">Editar mi Perfil</a>
		</div>
		@endif
		@endauth
	</div>
</div>
@section('notices')
<div class="col-md-4">
	<div class="list-group toggle">
		<button type="button" class="list-group-item list-group-item-action active">
			Cras justo odio
		</button>
		<button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
		<button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
		<button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
		<button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>
	</div>
</div>
@show
@endsection
