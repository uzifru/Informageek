@extends('backend.layouts.app')
<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					New Post
				</div>
				<div class="card-body">
					<form action="/posts/{{ $post->slug }}/edit" method="post" enctype="multipart/form-data">
						@method('patch')
						@csrf
						<div class="form-group">
							<label for="thumbnail">Gambar</label>
							<input name= "thumbnail" type="file" class="form-control" id="thumbnail">
							@error('thumbnail') <div class="text-danger mt-1" > {{$message}} </div> @enderror
						</div>


						<div class="form-group">
							<label for="title">Title</label>
							<input name= "title" type="text" class="form-control" id="title" value="{{ old('title') ?? $post->title }}">
							@error('title') <div class="text-danger mt-1" > {{$message}} </div> @enderror
						</div>

						<div class="form-group">
							<label for="categories">categories</label>
							<select name="categories[]" class="form-control select2" id="categories" multiple>
								@foreach($post->categories as $category)
								<option selected value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
								@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
							@error('categories') <div class="text-danger mt-1" > {{$message}} </div> @enderror
						</div>


						<div class="form-group">
							<label for="body">Body</label>
							<textarea name= "body" type="" rows="10" class="form-control" id="body">{{ old('body') ?? $post->body }}</textarea>
							@error('body') <div class="text-danger mt-1"> {{$message}} </div> @enderror
						</div>


						<button type="submit" class="btn btn-primary">Post</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	@section('content')
	@endsection