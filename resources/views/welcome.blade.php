@extends('layouts.app')

@section('content')

<h3>Esto es el Home</h3>

@forelse ($posts as $post)
<div class="container-sm mt-4 mb-4">
	<div class="card">
		<div class="card-body">
			<div class="card-title">
				<h4><a class="card-link" href="#">{{ $post['title'] }}</a></h4>
			</div>
				{{ $post['body'] }}
		</div>
	</div>
</div>
@empty
		<p>No se entraron Post</p>
@endforelse

@endsection