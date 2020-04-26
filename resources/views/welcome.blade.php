@extends('layouts.app')

@section('content')
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

@endsection