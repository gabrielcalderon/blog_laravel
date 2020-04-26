@extends('layouts.app')

@section('content')
<div class="card p-2">
		<div class="col-sm-10">
			<div class="card-img">
				@if ($profile->image->ruta !== "default.jpg")
					<img class="card-img img-account img-thumbnail" src="{{ asset('images/accounts/'.$profile->image->ruta) }}">
				@endif
			</div>
			<div class="card-title">
				<h5>{{ $profile->user->name }}</h5>
			</div>
		</div>
	<div class="card-body">{{ $profile->historial }}</div>
</div>

@auth
	@if (auth()->user()->id === $profile->user_id)
	<div class="btn-group-sm">
		<div class="btn-group-toggle">
			<a href="{{ route('account.edit', $profile) }}" class="btn btn-outline-info btn-sm mt-2">Editar mi Perfil</a>
		</div>
	</div>
	@endif
@endauth

@endsection