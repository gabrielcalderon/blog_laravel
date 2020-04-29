@extends('admin.dashboard.base')

@section('title','Usuarios Registrados')

@section('side-bar')
@include('admin.dashboard.macros._sidebar')
@endsection

@section('content-fluid')
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Usuarios Registrados</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Rol</th>
							<th>Fecha de Resgistro</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Rol</th>
							<th>Fecha de Resgistro</th>
							<th>Accion</th>
						</tr>
					</tfoot>
					<tbody>
						@forelse ($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->role->name }}</td>
							<td>{{ $user->created_at }}</td>
							<td class="small" colspan="2">
								<a class="btn-sm btn-outline-info " href="#">Editar</a>
								<a class="btn-sm btn-danger " href="#">Eliminar</a>
							</td>
						</tr>
						@empty
						<h5>Aun no Hay Usuarios Registrado</h5>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection