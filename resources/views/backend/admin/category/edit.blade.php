@extends('backend.layouts.admin')
@section('content')
<div class="hero bg-primary text-white">
	<div class="hero-inner">
		<h2>Edit Category</h2>
		<div class="card">
			<div class="card-body">
				<form action="{{ route('category.update', $category->slug) }}" method="post">
					@csrf
					@method('patch')
					<div class="form-group">
						<label for="name">Nama Kategori</label>
						<input name= "name" type="" class="form-control" id="name" autofocus="" value="{{ old('name') ?? $category->name }}">
					</div>
					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection