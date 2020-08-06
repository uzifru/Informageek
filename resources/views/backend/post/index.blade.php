@extends('backend.layouts.app')

@section('content')
<section class="p-0 m-0">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                Posts
            </div>
            <div class="">
                @if(Auth::check())
                <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a> 
                @else
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Login to create a post</a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                cek
            </div>
            <div class="col-md-7">
                @foreach($posts as $post)
                <div class="card">
                    <div class="card-header">
                        @if($post->thumbnail)
                        <a href="{{ route('posts.show', $post->slug) }}">
                            <img style="height: 380px" src="{{ $post->takeImage }}">
                        </a>
                        @endif
                        <h3><a href="{{ route('posts.show', $post->slug) }}">
                        {{ $post->title }}</a></h3>
                        <p>By: {{ $post->user->name }}</p>
                        <p>Kategori: 
                        @foreach($post->categories as $category)
                            <small>{{ $category->name }}</small>
                        @endforeach
                        </p>
                    </div>
                    <div class="card-body">
                        {{ Str::limit($post->body, 300) }}
                    </div>
                    <div class="card-footer">
                        <small class="text-secondary">{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>
                @endforeach
                <div>{{ $posts->links() }}</div>
            </div>
            <div class="col-md-2">
                cek
            </div>
        </div>
    </div>
</section>
@endsection