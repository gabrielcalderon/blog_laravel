@extends('layouts.base')

@section('title',"Editar Mi Perfil")

@section('content-base')
<div class="col-md-8">
	<form method="POST" action="{{ route('account.update', $profile) }}" class="form-group" class="container-fluid"
		enctype="multipart/form-data">
		@csrf
		{{ method_field('PUT') }}
		<h3>My Account <b class="text-info">{{ $profile->user->name }}</b></h3>
		<div class="form-group">
			<label class="col-form-label" for="">Nombre</label>
			<input class="form-control" type="text" name="name" value="{{ old('name',$profile->user->name) }}">
		</div>
		<div class="form-group">
			<label class="col-form-label" for="">Mi Direccion</label>
			<input class="form-control" type="text" name="direccion" value="{{ old('direccion',$profile->direccion) }}">
		</div>
		<div class="form-group">
			<label class="col-form-label" for="">Sobre Mí</label>
			<textarea class="form-control form-text" name="historial">{{ old('historial',$profile->historial) }}</textarea>
		</div>
		<div class="form-group">
			<label class="col-form-label" for="">Image</label>
			<input class="w-25 small" type="file" name="image_id" value="{{ old('image_id',$profile->image) }}">
			<a class="text-muted small" href="{{ asset('images/accounts/'.$profile->image->ruta) }}">{{ $profile->image->ruta }}</a>
		</div>
		<input type="submit" value="Actualizar mi Perfil" class="btn btn-outline-light bg-success">
	</form>
</div>
<div class="col-md-4">
	<div class="card" style="width: 20rem;">
		@if ($profile->image->ruta !== "default.jpg")
		<img class="card-img-top" src="{{ asset('images/accounts/'.$profile->image->ruta)}}">
		@endif
		<div class="card-body">
			<h5 class="card-title text-info">{{ Auth::user()->name }}</h5>
			<p class="card-text small">{{ $profile->historial }}</p>
		</div>
	</div>
</div>
@endsection