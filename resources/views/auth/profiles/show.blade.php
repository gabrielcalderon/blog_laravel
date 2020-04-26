@extends('layouts.app')

@section('content')
<div class="card p-2">
		<div class="col-sm-10">
			<div class="card-img">
				<img class="card-img img-account img-thumbnail" src="{{ asset('images/'.$profile->image->ruta) }}">
			</div>
			<div class="card-title">
				<h5>{{ $profile->user->name }}</h5>
			</div>
		</div>
	<div class="card-body">{{ $profile->historial }}</div>
</div>

@auth
	<div class="btn-group-sm">
		<div class="btn-group-toggle">
			<a href="{{ route('account.edit', $profile) }}" class="btn btn-outline-info btn-sm mt-2">Editar mi Perfil</a>
		</div>
	</div>
@endauth
@endsection