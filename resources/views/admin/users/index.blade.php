@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div class="container">
	
  <table class="table table-responsive">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Rol</th>
      <th scope="col">Creado</th>
      <th scope="col">Acción</th>
    </tr>
    @forelse ($users as $user)
    <tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->role->name }}</td>
			<td>{{ $user->created_at }}</td>
			<td class="small" colspan="2">
				<a class="btn-outline-info btn-sm" href="#">Editar</a>
				<a class="btn-danger btn-sm" href="#">Eliminar</a>
			</td>
    </tr>
		@empty
			<h5>Aun no Hay Usuarios Registrado</h5>
		@endforelse
  </table>
</div>
@endsection