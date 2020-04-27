@extends('layouts.base')

@section('content-base')
<div class="col-md-8">
	@forelse ($posts as $post)
	<div class="container-sm mb-4">
		<div class="card">
			<div class="card-body">
				<div class="card-title">
					<h4><a class="card-link" href="#">{{ $post['title'] }}</a></h4>
				</div>
				{{ $post['body'] }}
			</div>
			<div class="small">
				<div class="border-0 card-footer bg-transparent text-right">
					Autor: <a href="#" class="card-link">{{ $post['author'] }}</a>
				</div>
			</div>
		</div>
	</div>
	@empty
	<p>No se entraron Post</p>
	@endforelse
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