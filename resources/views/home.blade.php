@extends('layouts.base')

@section('content-base')
<div class="col-md-8">
	<div class="card">
		<div class="card-header">Dashboard</div>
		<div class="card-body">
			@if (session('status'))
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
			@endif
			Mi cuentas Bancarias
		</div>
	</div>
</div>
@endsection