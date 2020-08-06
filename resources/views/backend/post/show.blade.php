@extends('backend.layouts.app')

@section('content')
<section>
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header">
						<img width="400" src="{{ $post->takeImage }}">
						<h3>{{$post->title}}</h3>
						<small class="text-secondary">
							By : @if(auth()->user()->is($post->user)) You @else {{ $post->user->name}} @endif &middot; {{ $post->created_at->format("d F, Y") }}
						</small>
					</div>
					<div class="card-body">
						{!! nl2br($post->body) !!}
						<div class="">
							@can('delete', $post)
							<a href="/posts/{{$post->slug}}/edit" class="btn btn-success btn-sm mr-1">Edit</a>
							@endcan
							@can('delete', $post)
							<form action="/posts/{{ $post->slug }}/delete" method="post">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
							@endcan
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection